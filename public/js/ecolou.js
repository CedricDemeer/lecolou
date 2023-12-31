window.addEventListener('load', (event) => {
    
    chargerfont();
    initBtn();
    initSxitchDark();
});
window.addEventListener('resize', (event) => {
    //ecoloulog('resize');
});
var listefont;
function chargerfont(){
    fetch('data/fonts.json')
    .then((response) => response.json())
    .then((data) => {
        initselectvalue(data);
        }
    )
    }
    
function switchfont(name){
    document.querySelector('body').style = "font-family:"+name;
}
function initselectvalue(data){
    if(document.querySelector('#switchfont')){
        var select = document.querySelector("#switchfont");
        data.forEach(font => {
            var name = font.name.replaceAll("+"," ");
            var option = new Option(name,name);
            option.style = ("font-family:" + (name) );
            select.options[select.options.length] = option;
        });
    }
}
function initBtn(){
    //init du switch de fonts
    if(document.querySelector('#switchfont')){
        var select = document.querySelector("#switchfont");
        select.addEventListener('change', (event) => {
            switchfont(select.value);
        });
    }

    
}



function initSxitchDark(){
    if(document.querySelector('#switchDarkMod')){
        var switchDark = document.querySelector("#switchDarkMod");
        switchDark.addEventListener('click', (event) => {
            toggleTheme();
        });
    }

    const switchToggle = document.querySelector('#switch-toggle');
    let isDarkmode = false

    const darkIcon = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
    </svg>`

    const lightIcon = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
    </svg>`

    function toggleTheme (){
    isDarkmode = !isDarkmode
    localStorage.setItem('isDarkmode', isDarkmode)
    switchTheme()
    }

    function switchTheme (){
    if (isDarkmode) {
            switchToggle.classList.remove('bg-yellow-500','-translate-x-2')
            switchToggle.classList.add('bg-gray-700','translate-x-full')
            setTimeout(() => {
            switchToggle.innerHTML = darkIcon
            }, 250);
            document.documentElement.classList.add('dark')
        } else {
            switchToggle.classList.add('bg-yellow-500','-translate-x-2')
            switchToggle.classList.remove('bg-gray-700','translate-x-full')
            setTimeout(() => {
            switchToggle.innerHTML = lightIcon
            }, 250);
            document.documentElement.classList.remove('dark')
        }
    }
    switchTheme();
}

