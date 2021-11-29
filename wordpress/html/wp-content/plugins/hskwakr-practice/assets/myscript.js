window.addEventListener("load", function() {
  // store tabs variables
  var tabs = document.querySelectorAll("ul.nav-tabs > li");

  for (let i = 0; i < tabs.length; i++) {
    tabs[i].addEventListener("click", switchTab);
  }

  function switchTab(event) {
    document.querySelector("ul.nav-tabs li.active").classList.remove("active");
    document.querySelector(".tab-pane.active").classList.remove("active");

    var clickedTab = event.currentTarget;

    clickTab.preventDefault();
    clickTab.classList.add("active");
  }
});
