function instantCall() {
  var fontAwesome = document.createElement("link");
  fontAwesome.setAttribute("rel", "stylesheet");
  fontAwesome.setAttribute(
    "href",
    "https://use.fontawesome.com/releases/v5.7.0/css/all.css"
  );
  fontAwesome.setAttribute(
    "integrity",
    "sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
  );
  fontAwesome.setAttribute("crossorigin", "anonymous");

  document.head.appendChild(fontAwesome);

  var container = [];
  var link = document.createElement("a");
  var icon = document.createElement("i");

  link.setAttribute("href", "tel:011-11081333");

  icon.setAttribute("class", "fas fa-phone");

  for (var x = 0; x < 3; x++) {
    container[x] = document.createElement("div");
  }

  container[0].setAttribute(
    "class",
    "iCall position-fixed w-100 pb-0 pt-1 green text-center text-white"
  );
  container[0].setAttribute("style", "left: 0; bottom: 0;");

  container[1].setAttribute("style", "font-size: 150%;");

  container[2].setAttribute("style", "font-size: 65%;");
  container[2].innerHTML = "Call Us Now";

  container[1].appendChild(icon);
  container[0].appendChild(container[1]);
  container[0].appendChild(container[2]);

  link.appendChild(container[0]);

  document.body.appendChild(link);
}

instantCall();
