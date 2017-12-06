package com.optum.isl.batchprocess;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.List;

import org.quartz.Job;
import org.quartz.JobExecutionContext;
import org.quartz.JobExecutionException;

import com.jcraft.jsch.Channel;
import com.jcraft.jsch.ChannelSftp;
import com.jcraft.jsch.JSch;
import com.jcraft.jsch.Session;

public class SftpConnect implements Job{

	// File name to read from FTP
	// public static String fileName = "CopayHoldDispositions";
	public static String[] fileNames = { "CopayHoldDispositions", "CopayHoldDispositions_ADDCC", "CopayHoldDispositions_UPDATECC" };
	public static List<CopayHoldDispositions> copayHoldList = null;
	public static String dispositionFieldValue = "HBC";

	public static void connect(String sftpHost, String sftpUser, String sftpPass, int sftpPort, String sftpWorkingDir) {
		Session session = null;
		Channel channel = null;
		ChannelSftp channelSftp = null;
		try {
			// java secure channel
			JSch jsch = new JSch();

			// get session from jsch using SFTP details
			session = jsch.getSession(sftpUser, sftpHost, sftpPort);
			session.setPassword(sftpPass);

			// set StrictHostKeyChecking to no
			java.util.Properties config = new java.util.Properties();
			config.put("StrictHostKeyChecking", "no");
			session.setConfig(config);
			session.connect();

			channel = session.openChannel("sftp");
			channel.connect();

			channelSftp = (ChannelSftp) channel;
			channelSftp.cd(sftpWorkingDir);

			// System.out.println(channelSftp.getHome());

			/*
			 * Vector<ChannelSftp.LsEntry> list = channelSftp.ls("*"); for
			 * (ChannelSftp.LsEntry entry : list) {
			 * System.out.println(entry.getFilename()); }
			 */

			// read file importMC_Test_AW_Text_Import_Test.txt
			copayHoldList = new ArrayList<CopayHoldDispositions>();
			for (int i = 0; i < fileNames.length; i++) {
				InputStream stream = channelSftp.get("/import/" + SftpConnect.getFileNameToRead(i));
				System.out.println("START=============" + SftpConnect.getFileNameToRead(i) + "===================");
				SftpConnect.process(stream);
				//System.out.println("END=============" + SftpConnect.getFileNameToRead(i) + "===================");
				stream.close();
			}
			// print copayHoldList
			//System.out.println(copayHoldList);
			channelSftp.exit();
			session.disconnect();
		} catch (Exception ex) {
			ex.printStackTrace();
		}
	}

	public static String getCurrentDate() {
		return new SimpleDateFormat("yyyyMMdd").format(new Date());
	}

	public static String getFileNameToRead( int file_no ) {
//		return fileName[file_no] + getCurrentDate() + ".csv";
		 return fileNames[file_no] + getYesterdayDate() + ".csv";
	}

	public static void process(InputStream stream) {
		try {
			BufferedReader br = new BufferedReader(new InputStreamReader(stream));
			String line;
			Boolean skipHeaderLine = true;
			while ((line = br.readLine()) != null) {
				
				if( skipHeaderLine ){
					skipHeaderLine = false;
					continue;
				}
				String[] dataArr = line.split(",");
				if (dispositionFieldValue.equals(dataArr[3])) {
					// System.out.println(dataArr);
				//Email address
					//System.out.println(dataArr[0]);
//					System.out.println(dataArr[1]);
//					System.out.println(dataArr[2]);
					//Disposition
					//System.out.println(dataArr[3]);
//					System.out.println(dataArr[4]);
//					System.out.println(dataArr[5]);
//					System.out.println(dataArr[6]);
//					System.out.println(dataArr[7]);
					//System.out.println("--------------------------------");

					
					  CopayHoldDispositions copayHoldDispositions = new
					  CopayHoldDispositions();
					  copayHoldDispositions.setEmailAddress(dataArr[0]);
					  copayHoldDispositions.setCaseId(dataArr[1]);
					  copayHoldDispositions.setProviderName(dataArr[2]);
					  copayHoldDispositions.setDisposition(dataArr[3]);
					  copayHoldDispositions.setTimeDateStamp(dataArr[4]);
					  copayHoldDispositions.setOrderNumver(dataArr[5]);
					  copayHoldDispositions.setUserOpenedEmailAtTime(dataArr[6]);
					  copayHoldDispositions.setResponseDuration(dataArr[7]);
					  
					  copayHoldList.add(copayHoldDispositions);
					 
				}
			}			
		} catch (IOException io) {
			System.out.println("Exception occurred during reading file from SFTP server due to " + io.getMessage());
		} catch (Exception e) {
			System.out.println("Exception occurred during reading file from SFTP server due to " + e.getMessage());
		} finally {
			try {
				stream.close();				
			} catch (IOException e) {
				e.printStackTrace();
			}
		}
	}

	public static String getYesterdayDate() {
		Date curDate = new Date();
		final SimpleDateFormat format = new SimpleDateFormat("yyyyMMdd");
		// final Date date = format.parse(curDate);
		final Calendar calendar = Calendar.getInstance();
		calendar.setTime(curDate);
		calendar.add(Calendar.DAY_OF_YEAR, -5);
		return format.format(calendar.getTime());
	}
	


	public void execute(JobExecutionContext context)throws JobExecutionException {
		String sftpHost = "ftp1.exacttarget.com";
		String sftpUser = "Prescription";
		String sftpPass = "Prescription1";
		int sftpPort = 22;
		String sftpWorkingDir = "/import";

		SftpConnect.connect(sftpHost, sftpUser, sftpPass, sftpPort,	sftpWorkingDir);
		
//		System.out.println(SftpConnect.copayHoldList);
		if(SftpConnect.copayHoldList.size() > 0)
		{
			for(CopayHoldDispositions listItem:SftpConnect.copayHoldList){
				System.out.println(listItem.getDisposition() + "====="+ listItem.getEmailAddress());			
			}
		}
		else{
			System.out.println("No Email found With disposition as HBC");
		}	

	}

}
