var darkMode = document.getElementById('darkMode');

var darkLabel = "darkModeLabel";
var darkLang = "Sombre";
var lightLang = "Clair";

window.addEventListener('load', function () {
  if (darkMode) {
    initTheme();
    darkMode.addEventListener('change', function () {
      resetTheme();
    });
  }
});

function initTheme() {
  var darkThemeSelected = localStorage.getItem('darkMode') !== null && localStorage.getItem('darkMode') === 'dark';
  darkMode.checked = darkThemeSelected;
  darkThemeSelected ? document.body.setAttribute('data-theme', 'dark') : document.body.removeAttribute('data-theme');
  darkThemeSelected ? document.getElementById(darkLabel).innerHTML = darkLang : document.getElementById(darkLabel).innerHTML = lightLang;
}

function resetTheme() {
  if (darkMode.checked) {
    document.body.setAttribute('data-theme', 'dark');
    localStorage.setItem('darkMode', 'dark');
    document.getElementById(darkLabel).innerHTML = darkLang;
  } else {
    document.body.removeAttribute('data-theme');
    localStorage.removeItem('darkMode');
    document.getElementById(darkLabel).innerHTML = lightLang;
  }
}