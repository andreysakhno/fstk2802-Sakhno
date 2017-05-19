(function () {
	var i, productId,
		product1, product2;

	function Cart(name, price) {
		Cart.productsList.push(name);
		Cart.totalQty++;
		Cart.totalPrice += price;
		Cart.addToCart();
	}

	Cart.productsList = [];
	Cart.totalQty = 0;
	Cart.totalPrice = 0;

	Cart.addToCart = function () {
		var cartSelector = document.querySelector('.cart'),
			cartDetailsSelector = document.querySelector('.product-details .product-list'),
			productsLine = '';
		cartSelector.querySelector('.total-qty span').innerHTML = this.totalQty;
		cartSelector.querySelector('.total-price span').innerHTML = this.totalPrice;
		if(this.productsList.length != 0){
			this.productsList.forEach(function (item) {
				productsLine += '<div>' + item +  '</div>';
			});
			cartDetailsSelector.innerHTML = productsLine;
		}
	};

	function Product(id, name, price, qty, imgUrl) {
		this.id = id;
		this.name = name;
		this.price = price;
		this.qty = qty;
		this.imgUrl = imgUrl;
	}
	Product.prototype.initProduct = function () {
		var productsClass = document.querySelector('.products');
		productsClass.insertAdjacentHTML('beforeEnd',
										'<div class="product" id="product-' + this.id + '">' +
											'<div class="outer">' +
												'<div class="inner">' +
													'<img src="' + this.imgUrl + '" alt="' + this.name + '">' +
													'<h4 class="name">' + this.name + '</h4>' +
													'<h4 class="price">Цена: <span>' + this.price + '</span> грн.</h4>' +
													'<h4 class="qty">Количество: <span>' + this.qty + '</span></h4>' +
													'<button id="btn-product-' + this.id + '">Купить</button>' +
												'</div>' +
											'</div>' +
										'</div>');
		this.buy();
	};
	Product.prototype.buy = function () {
		var button = document.querySelector('#btn-product-' + this.id);
		button.addEventListener('click', function(event) {
			if (this.qty > 0) {
				--this.qty;
				document.querySelector('#product-' + this.id + ' .qty span').innerHTML = this.qty;
				new Cart(this.name, this.price);

			} else {
				alert('Товара нет в наличии');
			}
		}.bind(this));
	};

	function productIdInc() {
		var id = 0;
		return  function () {
			return ++id;
		}
	}
	productId = productIdInc();

	function Product1() {
		Product.call(this, productId(), arguments);
		this.name = 'Lenovo';
		this.price = 10000.00;
		this.qty = 10;
		this.imgUrl = 'img/img1.jpg';
	}
	Product1.prototype = Object.create(Product.prototype);
	Product1.prototype.constructor = Product1;

	function Product2() {
		Product.call(this, productId(), arguments);
		this.name = 'Dell';
		this.price = 15800.00;
		this.qty = 5;
		this.imgUrl = 'img/img1.jpg';
	}
	Product2.prototype = Object.create(Product.prototype);
	Product2.prototype.constructor = Product2;

	product1 = new Product1();
	product1.initProduct();

	product2 = new Product2();
	product2.initProduct();
})();

