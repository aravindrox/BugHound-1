function createReportValidate()
{
	var programJS = document.getElementById("pgm").value;
	if(programJS < 3) {
		alert("Please select program type from the list");
		
		return false;
	}
	
	var reportTypeJS = document.getElementById("reportType").value;
	if(reportTypeJS < 2) {
		alert("Please select report type from the list");
		return false;
	}
	
	var severityJS = document.getElementById("severity").value;
	if(severityJS < 2) {
		alert("Please select severity type from the list");
		return false;
	}
	
	var probSummaryJS = document.getElementById("probSummary").value;
	if(probSummaryJS < 5) {
		alert("Please enter problem summary at least of 5 letters");
		return false;
	}
	
	var fixJS = document.getElementById("fix").value;
	if(fixJS < 3) {
		alert("Please enter fix details");
		return false;
	}
	return true;
}