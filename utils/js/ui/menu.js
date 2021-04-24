console.log("Hello")
let menu = {};
fetchMenu((result) => {
    menu = result;
    activeMenu = 'appetizer'
    let startingIndex = 0;    
    console.log(menu);
    loadMenu(startingIndex, menu); 
    addClickEvent();

    document.querySelectorAll('.menu-type ul li').forEach(item => {
        item.addEventListener('click', (e) => {
            activeMenu = e.target.id;
            document.querySelectorAll('.menu-type ul li').forEach(item => {
                item.classList.remove('selected-menu');
            })
            e.target.classList.add('selected-menu');
            // Load full menu to UI
            loadMenu(startingIndex, menu);
            // Add event listener after loading menu each time
            addClickEvent();
        })
    }) 
})
function addClickEvent() {
    document.querySelectorAll('.menu-items').forEach(item => {
        item.addEventListener('click', (e) => {
            document.querySelectorAll('.menu-items').forEach(item => {
                console.log(item.classList)
                item.classList.remove('selected-menu-item');
            }) 
            e.target.classList.add('selected-menu-item')
            menu[activeMenu].forEach(item => {
                if(e.target.id === item.menu_id) {
                    updateMenuDetails(item.image, item.title, item.subtitle, item.description)
                }
            })
        })
    })
}
// Shows seperate blocks of menu
function showMenuItem(id, imgPath) {
    var output = `<div class="menu-items" id="${id}"><img src="../${imgPath}" class="menu" alt=""></div>`;
    document.querySelector(".menu").innerHTML += output;
}
// Show the detail menu to the right side of the menu container
function loadMenuDetails(menu) {
    var output = `
        <div class="preview">
            <button id="addtocart" class="addtocart"></button>
            <img src="../${menu[activeMenu][0].image}" alt="">
            <h2>${menu[activeMenu][0].title}</h2>
            <h3>${menu[activeMenu][0].subtitle}</h3>
            <p>${menu[activeMenu][0].description}</p>
        </div>
    `
    document.querySelector(".menu").innerHTML += output;
}
function updateMenuDetails(imgPath, title, subtitle, desc) {
    var preview = document.querySelector('.menu .preview');
    preview.innerHTML = `
        <button id="addtocart" class="addtocart"></button>
        <img src="../${imgPath}" alt="">
        <h2>${title}</h2>
        <h3>${subtitle}</h3>
        <p>${desc}</p>
    `;
    
}
//Menu pagination select
function menuPaginate(num, startingIndex) {
    let total = Math.ceil(num/4)
    const navigator = document.querySelector('.navigator')
    navigator.innerHTML = "";
    for(let i = 0; i < total; i++) {
        navigator.innerHTML += '<div></div>';
    }
    document.querySelector(`.navigator div:nth-child(${Math.floor(startingIndex/4) + 1})`).classList.add('selected-navigator')
}
function loadMenu(startingIndex, menu) {
    document.querySelector(".menu").innerHTML = '';
    // Show the detail menu to the right side of the menu container
    loadMenuDetails(menu);
    // Logic behind loading four menus from menu list to UI
    for(let i = startingIndex; i < menu[activeMenu].length; i++) {
        if(i >= startingIndex + 4) break;
        console.log(menu[activeMenu][i].image);
        showMenuItem(menu[activeMenu][i].menu_id, menu[activeMenu][i].image);
    }
    // Give pagination to menu
    menuPaginate(menu[activeMenu].length, startingIndex);
}

