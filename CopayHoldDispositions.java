package com.optum.isl.batchprocess;

public class CopayHoldDispositions {
	//Email Address,Case ID,Member/Provider Name,Disposition,Time Date Stamp,Order Number,User Opened email at Time,Response Duration
	String emailAddress;
	String caseId;
	String providerName;
	String disposition;
	String timeDateStamp;
	String orderNumver;
	String userOpenedEmailAtTime;
	String responseDuration;
	@Override
	public String toString() {
		return "CopayHoldDispositions [emailAddress=" + emailAddress
				+ ", caseId=" + caseId + ", providerName=" + providerName
				+ ", disposition=" + disposition + ", timeDateStamp="
				+ timeDateStamp + ", orderNumver=" + orderNumver
				+ ", userOpenedEmailAtTime=" + userOpenedEmailAtTime
				+ ", responseDuration=" + responseDuration + "]";
	}
	public String getEmailAddress() {
		return emailAddress;
	}
	public void setEmailAddress(String emailAddress) {
		this.emailAddress = emailAddress;
	}
	public String getCaseId() {
		return caseId;
	}
	public void setCaseId(String caseId) {
		this.caseId = caseId;
	}
	public String getProviderName() {
		return providerName;
	}
	public void setProviderName(String providerName) {
		this.providerName = providerName;
	}
	public String getDisposition() {
		return disposition;
	}
	public void setDisposition(String disposition) {
		this.disposition = disposition;
	}
	public String getTimeDateStamp() {
		return timeDateStamp;
	}
	public void setTimeDateStamp(String timeDateStamp) {
		this.timeDateStamp = timeDateStamp;
	}
	public String getOrderNumver() {
		return orderNumver;
	}
	public void setOrderNumver(String orderNumver) {
		this.orderNumver = orderNumver;
	}
	public String getUserOpenedEmailAtTime() {
		return userOpenedEmailAtTime;
	}
	public void setUserOpenedEmailAtTime(String userOpenedEmailAtTime) {
		this.userOpenedEmailAtTime = userOpenedEmailAtTime;
	}
	public String getResponseDuration() {
		return responseDuration;
	}
	public void setResponseDuration(String responseDuration) {
		this.responseDuration = responseDuration;
	}

}
