// import './bootstrap';

const yourCart = document.getElementById('your-cart');
const yourCartWrapper = document.getElementById('your-cart-wrapper');
const cart = document.getElementById('cart');
const toyMore = document.getElementById('toy-more');
const toyMoreWrapper = document.getElementById('toy-more-wrapper');
const cartContent = [];
const categories = [
    {id: 1, name: 'Мягкие игрушки'},
    {id: 2, name: 'Конструкторы'},
    {id: 3, name: 'Куклы'},
    {id: 4, name: 'Машинки'},
    {id: 5, name: 'Роботы'},
    {id: 6, name: 'Пазлы'},
    {id: 7, name: 'Электронные'},
    {id: 8, name: 'Творчество'}
];
const products = [
    {
        id: 1,
        img: 'https://cdn1.ozone.ru/s3/multimedia-h/6655620365.jpg',
        name: 'Мягкая игрушка - Мишка',
        category: 1,
        price: 990,
    },
    {
        id: 2,
        img: 'https://yandex-images.clstorage.net/1r0Mp0367/fcbfbetxG/_HP7GQohsOfAnEn-bJpD1e7UV0siSoJ3CngG9bHgdXSQJIEghbW1upn4OWs2NNmuM79cm25fAprXI9ubsbutV-lS_yFmQPWH7IxZqx2eP-G_EM_LntJqqvrkjgA1mGUdtASgPMDcGAr87TierxBhAkur5BLHkp_7isriisBaLLIQizIgD12AkwzwEabJ7t_5w0SXH04eSk62JL6ApTglPagAYThoMDjjQAHY8k9goQ4T5-jCK1LHt9b6ljbU2mQ2dKti0NdBdIcImPlSmbZPBevIK0NGkrpakhhGIGmYVQ00mHE0aBxMK8wJuBrTgOnW51dwYjMyv4MWmjZCeFLE8mi70tyDIWizFPgtAgWqu_kfiB_TWjpekiJcipRVyOllxCSRWCC8INsohTiOa0zZkuMHbNI_4gOHbs5qcixCpCJ02ypAr5H4B1TsFYbhalfp_-SP497Gppr-9EoImRh5IRC4TRhcMHBfRDHYAs_czdY3I9wub4qXT5KWNjYgohgeII8KGDvFkJOsKO0GuSZvGassf-9aEl6uIlTChFX0oZkYoA1UILzA2_Ap7BYjIO2KI-8YMhceP5-aFq7CLArk1vi3Unz3VbwTUCjJVgWqV42PDCPTsv7Cdg70upA1ZFXFLIBl4IC0vEsgdTQaYzBtoucHZJbL1rvTuh4KfiS6nA7o4540hw1w_9R8nd7x5ruV9zA_x4Jq1gY2WN542XRZ9YRMnYhYIGjXSAVoCmOwtco_27Qq--J7WyLqZua85sga_PMiyB9BIA8k-NEWyT5zgb_coy-2Qp46-tTWEDWsoU3keKmwEDAwl6hFJOIzgLVOK3ewPguOd-vaxg62dHIwHrhbKlhjoWAD_HTh5u2eww2XxOd_clJeIvrUovTB7F1xvKxRiLTg7Dscaeg6t2xVlnN3yO7_jhMXloL-Zti2qMKcZw4ghxF8G_iMlVIVtnsJa0Q_R7pqptIOINq0tVh8',
        name: 'Конструктор LEGO',
        category: 2,
        price: 2490,
    },
    {
        id: 3,
        img: 'https://main-cdn.sbermegamarket.ru/big2/hlr-system/204/265/195/710/245/36/100060268708b3.jpg',
        name: 'Кукла Barbie',
        category: 3,
        price: 1790,
    },
    {
        id: 4,
        img: 'https://avatars.mds.yandex.net/get-mpic/4370207/img_id8582616935526022920.jpeg/orig',
        name: 'Набор машинок',
        category: 4,
        price: 1290,
    },
    {
        id: 5,
        img: 'https://avatars.mds.yandex.net/get-mpic/5220597/2a00000194bf1acb363fe5baa0865b91f3be/orig',
        name: 'Робот-трансформер',
        category: 5,
        price: 3490,
    },
    {
        id: 6,
        img: 'https://yandex-images.clstorage.net/1r0Mp0367/fcbfbetxG/_HP7GQohsOfAnEn-bJpD1e7UV0siSoJ3CngG9bHgdXSQJIEghbW1upn4OWs2NNmuM79cm25fAprXI9ubsbutV-lS_yFmQPWH7IxZqx2eP-G_EM_LntJqqvrkjgA1mGUdtASgPMDcGAr87TierxBhAkur5BLHkp_7isriisBaLLIQizIgD12AkwzwEabJ7t_5w0SXH04eSk62JL6ApTglPagAYThoMDjjQAHY8k9goQ4T5-jCK1LHt9b6ljbU2mQ2dKti0NdBdIcImPlSmbZPBevIK0NGkrpakhhGIGmYVQ00mHE0aBxMK8wJuBrTgOnW51dwYjMyv4MWmjZCeFLE8mi70tyDIWizFPgtAgWqu_kfiB_TWjpekiJcipRVyOllxCSRWCC8INsohTiOa0zZkuMHbNI_4gOHbs5qcixCpCJ02ypAr5H4B1TsFYbhalfp_-SP497Gppr-9EoImRh5IRC4TRhcMHBfRDHYAs_czdY3I9wub4qXT5KWNjYgohgeII8KGDvFkJOsKO0GuSZvGassf-9aEl6uIlTChFX0oZkYoA1UILzA2_Ap7BYjIO2KI-8YMhceP5-aFq7CLArk1vi3Unz3VbwTUCjJVgWqV42PDCPTsv7Cdg70upA1ZFXFLIBl4IC0vEsgdTQaYzBtoucHZJbL1rvTuh4KfiS6nA7o4540hw1w_9R8nd7x5ruV9zA_x4Jq1gY2WN542XRZ9YRMnYhYIGjXSAVoCmOwtco_27Qq--J7WyLqZua85sga_PMiyB9BIA8k-NEWyT5zgb_coy-2Qp46-tTWEDWsoU3keKmwEDAwl6hFJOIzgLVOK3ewPguOd-vaxg62dHIwHrhbKlhjoWAD_HTh5u2eww2XxOd_clJeIvrUovTB7F1xvKxRiLTg7Dscaeg6t2xVlnN3yO7_jhMXloL-Zti2qMKcZw4ghxF8G_iMlVIVtnsJa0Q_R7pqptIOINq0tVh8',
        name: 'Пазл Disney',
        category: 6,
        price: 890,
    },
    {
        id: 7,
        img: 'https://microless.com/cdn/products/2689a498451967db9bcc668a30c7fbb1-hi.jpg',
        name: 'Интерактивная собака',
        category: 7,
        price: 2990,
    },
    {
        id: 8,
        img: 'https://yandex-images.clstorage.net/5fB1ti164/45cfe0NxO8/svtwTKc0ZQy2Qdxt2XcV8AYzitdvLiuvw8Zg4YXLWWz8ymzsE_clGaMNhQCdEd0FAi8BEZGlnkTvRnmjsW5f__a6e1e-Zz0HskXJMZhoGOR3Far4SRQc0-TkXYCbz0Ml9MIr_UmdSA3iUdNy-wvxOAsqCHbl4eEVrQQMwMg2MqKX4SIy-hBdAq9FyVGUTCLCYAmK1V4xG-XEwnGWh8VGIOXDYMlQhnBF93zGfdwT5xEyCAxY9sTELpAeKvHLCg-cruwIMOY5RBeRSudHtngWxFwTmdRbDDvG6sBHgarWdw7T71_JUohdZ_lozXXWLtISGBUEUeTvwzmsMRPj5hMJsqPhDijrP1EnuFbPSrR5FMRfBKrUQAId0dXObaihwn875txw5WmzcnzGbvtJ8TfXKQ0gElj48ekmqTgM-uA4HY2y0Rwi_gR2D6BlymaxXgHHYweuw1sKGfjg0WKkssxoKNDCVMB-tW1bw0nwR8s56SUEKChs0sf3EI48L__2DAK5o9IfL_0EayGKdO97k0Aj61wHseF4ByTO5eBElovFWAvT1WboZYRheeNv41jELtcQDSMmdMXR9g-jHgPCyD4Vi6jNAxT7ElkVslDpU5tpFM9PK47IfB4wyOjOcaqw4UAO8NdzzHqJTUPeQd501BX5AzkFLWHJ8vAUnhMt0OkTIo2s0S8i4BRYGalow26aQh_Cfyyj2kEvK-nX7mCHg8NgD_fQUsl_mlRvx1zBRNkA8yA6JyxG7dDpHagQDMHRNiWbqOAAMNoUdyula-hupG845Gk6rspADBDx5tNdmLHdZTXz2G_hWKFQWPx9_UrbGvEEDAUvcMPE5zeJDgb62DEXirbjKATpG1QhjUHMS7BDMPFtMKL0SRIAw9fqeJmV10A22t1p_XWHWGnaTMR_8S70ExILAlH79_YtiSEl9vo4Kqm36xIT4iBfCJJJ9FGwSz3lQDCs4HEmPfvqz2Ohm8w',
        name: 'Доска для рисования',
        category: 8,
        price: 690,
    }
];

function createElement(el, {className = '', id = '', text = '', src = '', alt = '', type = ''} = {}) {
    const element = document.createElement(el);

    if (src) element.src = src;
    if (className) element.className = className;
    if (text) element.textContent = text;
    if (type) element.type = type;
    if (id) element.id = id;
    if (alt) element.alt = alt;

    return element;
}

function addItemToCart(product) {
    const item = cartContent.find(el => el.id === product.id);

    if (item) {
        item.count++;
    } else {
        cartContent.push({...product, count: 1});
    }

    checkCart();
}

function fillCategories() {
    const categoriesWrapper = document.querySelector('.categories');

    categories.forEach(category => {
        const link = createElement('a', {text: category.name});
        link.href = '#';
        link.dataset.category = category.id;
        categoriesWrapper.appendChild(link);
    });
}

function fillProducts(productsArray = products) {
    const productsWrapper = document.querySelector('.products-wrapper');
    productsWrapper.innerHTML = '';

    productsArray.forEach(product => {
        const productsItem = createElement('div', {className: 'products-item'});
        productsItem.dataset.category = product.category;
        productsItem.dataset.id = product.id;
        productsItem.addEventListener('click', openMore);

        const imgContainer = createElement('div', {className: 'img-container'});
        const img = createElement('img', {src: product.img, alt: product.name});
        const content = createElement('div', {className: 'content'});
        const title = createElement('h3', {text: product.name});
        const price = createElement('p', {className: 'price', text: product.price + ' ₽'});
        const button = createElement('button', {className: 'btn add-to-cart', type: 'button', text: 'В корзину'});

        productsWrapper.appendChild(productsItem);
        productsItem.appendChild(imgContainer);
        imgContainer.appendChild(img);
        productsItem.appendChild(content);
        content.appendChild(title);
        content.appendChild(price);
        content.appendChild(button);

        button.addEventListener('click', (e) => {
            e.stopPropagation();
            addItemToCart(product);
        });
    });
}

function openCart() {
    yourCart.classList.add('show');
    yourCartWrapper.classList.add('show');
}

function closeCart() {
    yourCart.classList.remove('show');
    yourCartWrapper.classList.remove('show');
}

function checkCart() {
    yourCartWrapper.innerHTML = '';

    const title = createElement('div', {className: 'title'});
    const h2 = createElement('h2', {text: 'Ваша корзина'});
    const closeCartBtn = createElement('button', {id: 'close-cart', type: 'button', text: '✕'});

    yourCartWrapper.appendChild(title);
    title.appendChild(h2);
    title.appendChild(closeCartBtn);

    closeCartBtn.addEventListener('click', closeCart);

    const quantityOfProducts = document.querySelector('#cart .quantity-of-products');
    quantityOfProducts.textContent = (cartContent.length).toString();

    if (cartContent.length <= 0) {
        quantityOfProducts.classList.remove('active');

        const yourCartContent = createElement('div', {className: 'content'});
        yourCartWrapper.appendChild(yourCartContent);

        const empty = createElement('p', {text: 'Ваша корзина пуста'});
        const btn = createElement('button', {
            className: 'btn',
            id: 'continue-shopping',
            type: 'button',
            text: 'Продолжить покупки'
        });

        btn.addEventListener('click', closeCart);

        yourCartContent.appendChild(empty);
        yourCartContent.appendChild(btn);

        return;
    }

    quantityOfProducts.classList.add('active');
    cart.classList.add('animate');
    setTimeout(() => cart.classList.remove('animate'), 500);

    const content = createElement('div', {className: 'content not-empty'});
    yourCartWrapper.appendChild(content);

    cartContent.forEach(item => {
        const toy = createElement('div', {className: 'toy'});
        const div = createElement('div');
        const imgContainer = createElement('div', {className: 'img-container'});
        const img = createElement('img', {src: item.img});
        const info = createElement('div', {className: 'info'});
        const h3 = createElement('h3', {text: item.name});
        const p = createElement('p', {className: 'price', text: item.price + ' ₽'});
        const buttons = createElement('div', {className: 'buttons'});
        const buttonMinus = createElement('button', {className: 'btn', type: 'button', text: '-'});
        const count = createElement('p', {className: 'count', text: (item.count).toString()});
        const buttonPlus = createElement('button', {className: 'btn', type: 'button', text: '+'});
        const buttonDelete = createElement('button', {type: 'button', text: '✕'});

        content.appendChild(toy);
        toy.appendChild(div);
        toy.after(createElement('hr'));
        div.appendChild(imgContainer);
        imgContainer.appendChild(img);
        div.appendChild(info);
        info.appendChild(h3);
        info.appendChild(p);
        toy.appendChild(buttons);
        buttons.appendChild(buttonMinus);
        buttons.appendChild(count);
        buttons.appendChild(buttonPlus);
        buttons.appendChild(buttonDelete);

        buttonPlus.addEventListener('click', () => {
            item.count++;
            checkCart();
        });

        buttonMinus.addEventListener('click', () => {
            if (item.count <= 1) return;

            item.count--;
            checkCart();
        });

        buttonDelete.addEventListener('click', () => {
            const index = cartContent.findIndex(el => el.id === item.id);

            if (index !== -1) cartContent.splice(index, 1);

            checkCart();
        });
    });

    const sum = cartContent.reduce((sum, item) => sum + (item.price * item.count), 0);

    const costWrapper = createElement('div', {className: 'cost-wrapper'});
    const cost = createElement('div', {className: 'cost'});
    const pCost1 = createElement('p', {text: 'Итого:'});
    const pCost2 = createElement('p', {text: sum + ' ₽'});
    const costButton = createElement('button', {className: 'btn success', type: 'button', text: 'Оформить заказ'});
    yourCartWrapper.appendChild(costWrapper);
    costWrapper.appendChild(cost);
    cost.appendChild(pCost1);
    cost.appendChild(pCost2);
    costWrapper.appendChild(costButton);
}

function filterByCategory() {
    const categoryId = +this.dataset.category;
    const filteredProducts = products.filter(item => item.category === categoryId);
    fillProducts(filteredProducts);

    categoryItems.forEach(category => {
        if (+category.dataset.category === categoryId) {
            category.classList.add('active');
        } else {
            category.classList.remove('active');
        }
    });
}

cart.addEventListener('click', openCart);
fillCategories();
fillProducts();
checkCart();

const categoryItems = document.querySelectorAll('.categories *');
categoryItems.forEach(category => category.addEventListener('click', filterByCategory));

const allCategories = document.querySelector('.all-categories');
allCategories.addEventListener('click', () => {
    allCategories.classList.add('active');
    fillProducts();
});

function openMore(e) {
    e.stopPropagation();

    const productItem = this.closest('.products-item');

    currentProduct = products.find(el => el.id === +productItem.dataset.id);

    toyMoreWrapper.querySelector('img').src = currentProduct.img;
    toyMoreWrapper.querySelector('h3').textContent = currentProduct.name;
    toyMoreWrapper.querySelector('.category').textContent = categories.find(el => el.id === currentProduct.category).name;
    toyMoreWrapper.querySelector('.price').textContent = currentProduct.price + ' ₽';

    toyMore.classList.add('show');
    toyMoreWrapper.classList.add('show');
}

function closeMore() {
    toyMore.classList.remove('show');
    toyMoreWrapper.classList.remove('show');
}

let currentProduct = null;

toyMoreWrapper.querySelector('.title').addEventListener('click', closeMore);
toyMoreWrapper.querySelector('.btn').addEventListener('click', () => {
    if (currentProduct) {
        addItemToCart(currentProduct);
        closeMore();
    }
});

function searchProducts() {
    const search = searchToysInput.value.toLowerCase().trim();

    if (search === '') {
        fillProducts();
        return;
    }

    const filteredProducts = products.filter(item => item.name.toLowerCase().includes(search));

    fillProducts(filteredProducts);
}

const searchToysInput = document.getElementById('search_toys');
searchToysInput.addEventListener('input', searchProducts);
