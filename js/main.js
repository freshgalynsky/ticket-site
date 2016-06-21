/* Run */
	$(function(){
		//
		GetStatsTicketOffice();
		GetStatsTicketProduction();
		GetStatsTicketAccounting();
		//AutoRun();
		GetLogOffice();
		GetLogProduction();
		GetLogAccounting();
	});
	
	function AutoRun()
	{
		setInterval(GetStatsTicketOffice, 1000);
		setInterval(GetStatsTicketProduction, 1000);
		setInterval(GetStatsTicketAccounting, 1000);
		//setInterval(GetLogOffice, 1000);
	}
/* /Run */
/* Stations */
	/* Office */
		function GetStatsTicketOffice()
		{
			$.ajax({
				url: "../ajax/stations/office/stats.php",
				dataType: "json",
				success: function(data){
					$("#ticket_office_day").html(data.day);
					$("#ticket_office_month").html(data.month);
					$("#ticket_office_total").html(data.total);
				}
			});
		}
		function GetLogOffice()
		{
			$.ajax({
				url: "../ajax/stations/office/log.php",
				dataType: "json",
				success: function(data){
					$("#log_office_connection").html(data.connection);
					$("#log_office_empty").html(data.empty);
					$("#log_office_key").html(data.key);
				}
			});
		}
	/* /Office */
	/* Production */
		function GetStatsTicketProduction()
		{
			$.ajax({
				url: "../ajax/stations/production/stats.php",
				dataType: "json",
				success: function(data){
					$("#ticket_production_day").html(data.day);
					$("#ticket_production_month").html(data.month);
					$("#ticket_production_total").html(data.total);
				}
			});
		}
		function GetLogProduction()
		{
			$.ajax({
				url: "../ajax/stations/production/log.php",
				dataType: "json",
				success: function(data){
					$("#log_production_connection").html(data.connection);
					$("#log_production_empty").html(data.empty);
					$("#log_production_key").html(data.key);
				}
			});
		}
	/* /Production */
	/* Accounting */
		function GetStatsTicketAccounting()
		{
			$.ajax({
				url: "../ajax/stations/accounting/stats.php",
				dataType: "json",
				success: function(data){
					$("#ticket_accounting_day").html(data.day);
					$("#ticket_accounting_month").html(data.month);
					$("#ticket_accounting_total").html(data.total);
				}
			});
		}
		function GetLogAccounting()
		{
			$.ajax({
				url: "../ajax/stations/accounting/log.php",
				dataType: "json",
				success: function(data){
					$("#log_accounting_connection").html(data.connection);
					$("#log_accounting_empty").html(data.empty);
					$("#log_accounting_key").html(data.key);
				}
			});
		}
	/* /Accounting */
/* /Stations */