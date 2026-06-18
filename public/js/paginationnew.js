const products = taskRowsTest;

let productContainer;
let productCount;

let pageUrl = window.location.pathname.substring(thisUrl.lastIndexOf('/')+1);
console.log("pageUrl = " + pageUrl);

switch (pageUrl) {
    case "taskChoice":
        productContainer = document.querySelector('#taskModeChoice');
        productCount = 2;
        break;
    case "taskLang":
        productContainer = document.querySelector('#taskModeLang');
        productCount = 2;
        break;
    case "taskMix":
        productContainer = document.querySelector('#taskModeMix');
        productCount = 2;
        break;
    case "taskPlain":
        productContainer = document.querySelector('#taskModePlain');
        productCount = 4;   // 5;
        break;
}

const paginate = (products) => {
    //let productCount = 2;   // 7;   // num products on each page
    let currentPage = 1;    // current page

    //const productContainer = document.querySelector('#taskModeChoice');   // product list
    const pagination = document.querySelector('.navi-buttons');  //container for pagination
    const btnPrevPagination = document.querySelector('#prevBtn');
    const btnNextPagination = document.querySelector('#nextBtn');



    // function for render products
    const renderProducts = (products, container, numberOfProducts, page) => {
      if (!products || !products.length) return;

        productContainer.innerHTML = "";

        const firstProductIndex = numberOfProducts * page - numberOfProducts;
        console.log('firstProductIndex: ', firstProductIndex);

        //const lastProductIndex = firstProductIndex + numberOfProducts;
        const lastProductIndex = Math.min(firstProductIndex + numberOfProducts, products.length) ;
        console.log('lastProductIndex: ', lastProductIndex);

        const productsOnPage = products.slice(firstProductIndex, lastProductIndex);
        //console.log('productsOnPage: ', productsOnPage);

        switch (pageUrl) {
            case "taskChoice":
                pageRowsCompChoiceDom(firstProductIndex, lastProductIndex);;
                break;
            case "taskLang":
                pageRowsCompLangDom(firstProductIndex, lastProductIndex);;
                break;
            case "taskMix":
                pageRowsCompMixDom(firstProductIndex, lastProductIndex);;
                break;
            case "taskPlain":
                pageRowsCompPlainDom(firstProductIndex, lastProductIndex);;
                break;
        }

        //pageRowsCompChoiceDom(firstProductIndex, lastProductIndex);
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
          const targetLi = event.target.closest('.pagination-item');
          if (!targetLi) return;

          //currentPage = parseInt(targetLi.textContent, 10);
          parsedPage = parseInt(targetLi.textContent, 10);

          if (isNaN(parsedPage)) return;

          currentPage = parsedPage;

          renderProducts(products, productContainer, productCount, currentPage);

          let currentLi = document.querySelector('.pagination-item.active');
          if (currentLi) currentLi.classList.remove('active');
          targetLi.classList.add('active');

          const liElements = document.querySelectorAll('.pagination-item');

          managePagination(liElements.length);

        });
    };

    //let pageLimit = 8;  // page limit to ellipsis

    // function for too long pagination hide to ...
    const managePagination = (pagesCount) => {
        const container = document.querySelector('.pagination-list');
        const links = container.querySelectorAll('li');

        const oldEllipsis = container.querySelectorAll('.ellipsis');
        oldEllipsis.forEach(el => el.remove());

        const totalPages = pagesCount;
        
        if (totalPages > 4) {
            for (let i=1; i < links.length -1; i++) {
                links[i].style.display = 'none';
            }

            const currentIdx = currentPage -1;
            if (links[currentIdx]) links[currentIdx].style.display = '';
            if (links[currentIdx - 1]) links[currentIdx - 1]. style.display = '';
            if (links[currentIdx + 1]) links[currentIdx + 1]. style.display = '';

            links[0].style.display = '';
            links[links.length - 1].style.display = '';

            if (currentPage > 3) {
              const ellipsisLeft = document.createElement('span');
              ellipsisLeft.classList.add('ellipsis');
              ellipsisLeft.textContent = '...';
              container.insertBefore(ellipsisLeft, links[currentIdx - 1]);
            }

            if (currentPage < totalPages - 2) {
              const ellipsisRight = document.createElement('span');
              ellipsisRight.classList.add('ellipsis');
              ellipsisRight.textContent = '...';
              container.insertBefore(ellipsisRight, links[currentIdx + 2]);
            }

        } else {
            links.forEach(link => link.style.display = '');
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
        const liElements = document.querySelectorAll('.pagination-item');

        if (!liElements.length || !currentActiveLi) return;

        let newActiveLi;    // this new active page button

        if (event.target.closest('#nextBtn')) {
          currentPage++;
          if (currentPage > liElements.length) {
            currentPage = 1;
            newActiveLi = liElements[0];
          } else {
            newActiveLi = currentActiveLi.nextElementSibling;
          }
        } else {
          currentPage--;
          if (currentPage < 1) {
            currentPage = liElements.length;
            newActiveLi = liElements[liElements.length - 1];
          } else {
            newActiveLi = currentActiveLi.previousElementSibling;
          }
        }

        if (currentActiveLi && newActiveLi) {
          currentActiveLi.classList.remove('active');
          newActiveLi.classList.add('active');
        }

        renderProducts(products, productContainer, productCount, currentPage);
        managePagination(liElements.length);

    };

    btnNextPagination.addEventListener('click', handlePagination);
    btnPrevPagination.addEventListener('click', handlePagination);

};

paginate(products);

