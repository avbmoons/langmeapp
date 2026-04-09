const products = taskRowsTest;

const paginate = (products) => {
    let productCount = 2;   // 7;   // num products on each page
    let currentPage = 1;    // current page

    const productContainer = document.querySelector('#taskModeMix');   // product list
    const pagination = document.querySelector('.navi-buttons');  //container for pagination
    const btnPrevPagination = document.querySelector('#prevBtn');
    const btnNextPagination = document.querySelector('#nextBtn');



    // function for render products
    const renderProducts = (products, container, numberOfProducts, page) => {

        productContainer.innerHTML = "";

        const firstProductIndex = numberOfProducts * page - numberOfProducts;
        console.log('firstProductIndex: ', firstProductIndex);

        const lastProductIndex = firstProductIndex + numberOfProducts;
        console.log('lastProductIndex: ', lastProductIndex);

        const productsOnPage = products.slice(firstProductIndex, lastProductIndex);
        console.log('productsOnPage: ', productsOnPage);

        pageRowsCompMixDom(firstProductIndex, lastProductIndex);

    };

    // function for render pages
    const renderPagination = (products, numberOfProducts) => {

        const pagesCount = Math.ceil(products.length / numberOfProducts)//;
        console.log('pagesCount: ', pagesCount);

        const ul = document.querySelector('.pagination-list');

        for (let i=1; i <= pagesCount; i++) {
            const li = renderBtn(i);
            ul.append(li);
        }

        managePagination(pagesCount);

        pagination.classList.remove('hidden');
    };

    // function for render each page button between Prev and Next
    const renderBtn = (page) => {

        const li = document.createElement('li');
        li.classList.add('pagination-item');
        li.textContent = page;

        if (currentPage === page) {
            li.classList.add('active');
        }

        return li;
    };    

    // function for update pagination
    const updatePagination = () => {
        pagination.addEventListener('click', (event) => {
            if(!event.target.closest('.pagination-item')) {
                return;
            } else {
                currentPage = event.target.textContent;

                console.log('Click on none');
                renderProducts(products, productContainer, productCount, currentPage);

                let currentLi = document.querySelector('.pagination-item.active');
                currentLi.classList.remove('active');
                event.target.classList.add('active');
            }
        });
    };

    // function for too long pagination hide to ...
    const managePagination = (pagesCount) => {
        const container = document.querySelector('.pagination-list');
        const links = container.querySelectorAll('li');
        const totalPages = pagesCount;
        
        if (totalPages > 8) {
            for (let i=1; i < links.length -1; i++) {
                links[i].style.display = 'none';
            }

            let ellipsis = container.querySelector('span');
            if (!ellipsis) {
                ellipsis = document.createElement('span');
                ellipsis.textContent = '...';
                container.insertBefore(ellipsis, links[links.length - 1]);
            }
            ellipsis.style.display = '';
            // show first and last parts
            for (let j=1; j < 8; j++) {
                links[j].style.display = '';
            }
            links[links.length - 1].style.display = '';
        } else {
            links.forEach(link => link.style.display = '');
            const ellipsis = container.querySelector('span');
            if (ellipsis) {
                ellipsis.style.display = 'none';
            }
        }
    };

    renderProducts(products, productContainer, productCount, currentPage);
    renderPagination(products, productCount);
    updatePagination();

    // all page's buttons
    const liElements = document.querySelectorAll('.pagination-item');

    // function for hanle pagination by Prev & Next buttons
    const handlePagination = (event) => {
        const currentActiveLi = document.querySelector('.pagination-item.active');  // this active page button
        let newActiveLi;    // this new active page button

        if (event.target.closest('#nextBtn')) {
            newActiveLi = currentActiveLi.nextElementSibling;
            console.log('newActiveLi: ', newActiveLi);

            currentPage++;
        } else {
            newActiveLi = currentActiveLi.previousElementSibling;
            console.log('newActiveLi: ', newActiveLi);

            currentPage--;
        }

        if (!newActiveLi && event.target.closest('#nextBtn')) {
            newActiveLi = liElements[0];
        } else if (!newActiveLi) {
            newActiveLi = liElements[liElements.length - 1];
        }

        currentActiveLi.classList.remove('active');
        newActiveLi.classList.add('active');

        // condition for circle render
        if (currentPage > liElements.length) {
            currentPage = 1;
        } else if (currentPage < 1) {
            currentPage = liElements.length;
        }

        renderProducts(products, productContainer, productCount, currentPage);

    };

    btnNextPagination.addEventListener('click', handlePagination);
    btnPrevPagination.addEventListener('click', handlePagination);

};

paginate(products);

