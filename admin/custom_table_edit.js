$(document).ready(function(){
	$('#dataTable').Tabledit({
		deleteButton: false,
		editButton: false,   		
		columns: {
		  identifier: [0, 'id'],                    
		  editable: [[1, 'name'], [2, 'position'], [3, 'department'], [4, 'email'], [5, 'ban']]
		},
		hideIdentifier: true,
		url: 'live_edit.php'		
	});
});