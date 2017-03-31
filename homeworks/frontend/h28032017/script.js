// Конструкция if/else
var age;
age = prompt("Введите Ваш возраст", "30.5");

if (age > 0 && age <= 17) {
	console.log("Вам еще рано работать");
} else if (age >= 18 && age <= 59) {
	console.log("Вам еще работать и работать");
} else if (age > 59) {
	console.log("Вам пора на пенсию");
} else
	console.log("Неправильный возраст");

// Конструкция switch
var day;
day = prompt('Введите день недели', '1');
switch (day) {
case '1':
case '2':
case '3':
case '4':
case '5':
	console.log('Это рабочий день');
	break;
case '6':
case '7':
	console.log('Это выходной день');
	break;
default:
	console.log('Это не день недели');
}

// Конструкция for
var char = '';
for (i = 0; i < 10; i++) {
	console.log(char += 'xx');
}

//Напишите код, который проверяет что в переменной maybeNumber находится число
var maybeNumber = 110;

if (typeof(maybeNumber) == 'number') {
	console.log(maybeNumber + ' - число');
} else {
	console.log(maybeNumber + ' - не число');
}
