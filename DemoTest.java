package com.optum.isl.batchprocess;

import org.quartz.JobBuilder;
import org.quartz.JobDetail;
import org.quartz.Scheduler;
import org.quartz.SchedulerException;
import org.quartz.SimpleScheduleBuilder;
import org.quartz.Trigger;
import org.quartz.TriggerBuilder;
import org.quartz.impl.StdSchedulerFactory;


public class DemoTest {

	public DemoTest() {
	}

	public static void main(String[] args) {

		//============================= batch process through main method =========================================
		/*String sftpHost = "ftp1.exacttarget.com";
		String sftpUser = "Prescription";
		String sftpPass = "Prescription1";
		int sftpPort = 22;
		String sftpWorkingDir = "/import";

		SftpConnect.connect(sftpHost, sftpUser, sftpPass, sftpPort,	sftpWorkingDir);
		
		//System.out.println(SftpConnect.copayHoldList);
		if(SftpConnect.copayHoldList.size() > 0)
		{
			for(CopayHoldDispositions listItem:SftpConnect.copayHoldList){
				System.out.println(listItem.getDisposition() + "====="+ listItem.getEmailAddress());			
			}
		}
		else{
			System.out.println("No Email found With disposition as HBC");
		}*/
		
		

		//============================= batch process through Scheduler job =========================================
		
		//Through Scheduler excute the batch process task
		/* JobDetail job = new JobDetail();
		 job.setName("dummyJobName");
		 job.setJobClass(HelloJob.class);*/

		JobDetail job = JobBuilder.newJob(SftpConnect.class)
				.withIdentity("dummyJobName", "group1").build();

		/* SimpleTrigger trigger = new SimpleTrigger();
		 trigger.setStartTime(new Date(System.currentTimeMillis() + 1000));
		 trigger.setRepeatCount(SimpleTrigger.REPEAT_INDEFINITELY);
		 trigger.setRepeatInterval(30000);*/

		// Trigger the job to run on the next round minute
		Trigger trigger = TriggerBuilder
				.newTrigger()
				.withIdentity("dummyTriggerName", "group1")
				.withSchedule(
						SimpleScheduleBuilder.simpleSchedule()
								.withIntervalInSeconds(3*60).repeatForever())
				.build();

		// schedule it
		Scheduler scheduler;
		try {
			scheduler = new StdSchedulerFactory().getScheduler();
			scheduler.start();
			scheduler.scheduleJob(job, trigger);
		} catch (SchedulerException e) {
			e.printStackTrace();
		}	
	}
}
