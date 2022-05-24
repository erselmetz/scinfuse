var today = new Date()
var curHr = today.getHours()

if (curHr < 12) {
		document.write('Good Morning,')
} else if (curHr < 18) {
		document.write('Good Afternoon,')
} else {
		document.write('Good Evening,')
}