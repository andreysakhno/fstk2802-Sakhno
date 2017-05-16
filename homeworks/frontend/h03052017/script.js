(function () {
	/*
	 Переписать калькулятор (который мы писали на занятии) с использованием функции конструктора.
	 */

	/* BEGIN */
	function Calculator() {
		var calcMethods = {
			sum: function(num, num1) {
				return num + num1;
			},
			subtract: function(num, num1) {
				return num - num1;
			},
			multiply: function(num, num1) {
				return num*num1;
			},
			divide: function (num, num1) {
				return num/num1;
			},
		};

		var map = {
			'+': calcMethods.sum,
			'-': calcMethods.subtract,
			'*': calcMethods.multiply,
			'/': calcMethods.divide
		};

		this.calculation = function(op, lOp, rOp) {
			return map[op](lOp, rOp);
		}
	}

	var leftOperand = document.getElementById('leftOperand'),
		rightOperand = document.getElementById('rightOperand'),
		operator = document.getElementById('operator'),
		form = document.getElementById('form');

	form.addEventListener('submit', function (event) {
		event.preventDefault();
		var calc = new Calculator();
		var res = calc.calculation(operator.value, Number(leftOperand.value), Number(rightOperand.value));
		console.log(res);

		var calc1 = new Calculator();
		var res1 = calc1.calculation('-', 4, 3);
		console.log(res1);
	});

	/* END */

	/*
		Напишите функции isEqual которая будет ожидать два параметра - обьекта и будет сравнивать их (равны они или нет).
		Результатом выполнения данной функции должно быть булевое значение true или false
	*/

	/* BEGIN */
	function isEqual(a, b) {
		if(a === b) return true;

		if (Object.keys(a).length !== Object.keys(b).length) return false;

		for(var key in a) {
			if(!a.hasOwnProperty(key) || !b.hasOwnProperty(key)) return false;
			if (!isEqual(a[key], b[key])) return false;
		}

		return true;
	}

	var obj1 = {a: 1, b: 2},
		obj2 = {a: 1, b: 2},
		obj3 = obj1,
		obj4 = {a: 1, b: 2, c: 3},
		obj5 = {a: 1, b: {d: 4, f: 5}, c: 3},
		obj6 = {a: 1, b: {d: 4, f: 5}, c: 3},
		obj7 = {a: 1, b: {d: 4}, c: 3},
		obj8 = {a: 1, b: {e: 4}, c: 3};

	isEqual(obj1, obj2) ? console.log('Равны') : console.log('Не равны');
	isEqual(obj1, obj3) ? console.log('Равны') : console.log('Не равны');
	isEqual(obj2, obj3) ? console.log('Равны') : console.log('Не равны');
	isEqual(obj1, obj4) ? console.log('Равны') : console.log('Не равны');
	isEqual(obj5, obj6) ? console.log('Равны') : console.log('Не равны');
	isEqual(obj6, obj7) ? console.log('Равны') : console.log('Не равны');
	isEqual(obj7, obj8) ? console.log('Равны') : console.log('Не равны');
	/* END */

})();


