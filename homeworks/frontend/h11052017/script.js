(function () {
	/*
	 1) Создать конструктор который будет считать площадь, у него будут внутрение свойства width и height.
	 Так же у него будет метод getSquare который и будет непосредственно считать.
	 Нужно вызвать данный метод 3 раза. Первый раз с оригинальным контекстом и два раза подменяя контекст на новый.
	 */

	/* BEGIN */

	function Square(width, height) {
		this.width = width;
		this.height = height;
	}
	Square.prototype.getSquare = function () {
		return this.width * this.height;
	}

	var area = new Square(100, 200);
	console.log(area.getSquare());

	var obj = {
		width : 10,
		height : 5,
	}
	console.log(Square.prototype.getSquare.call(obj));
	obj.width = 5;
	console.log(Square.prototype.getSquare.call(obj));
	/* END */

	/*
	 2) Написать свою реализацию метода bind. Он должен работать так же как и оригинальный.
	 (Подсказка: В реализации используйте метод call.)
	 */

	/* BEGIN */

	function Circle() {
		this.radius = 10;
	}
	Circle.prototype.getCircleArea = function (unit) {
		return 3.14 * Math.pow(this.radius, 2) + ' ' + unit;
	}

	function bind(func, context) {
		var args = Array.prototype.slice.call(arguments, 2);
		return function() {
			return func.apply(context, args);
		};
	}

	var circle = new Circle();
	var getAreaFunc = circle.getCircleArea;

	var foo = bind(getAreaFunc, {radius: 100}, 'кв.м');
	console.log(foo());

	console.log(bind(getAreaFunc, {radius: 20}, 'кв.м')());

	/* END */

})();


