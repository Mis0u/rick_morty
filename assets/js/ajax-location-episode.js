async function main() {
  let residents = document.querySelectorAll(".js-actual-residents");
  let load = document.querySelector("#load");

  for (let i = 0; i < residents.length; i++) {
    let resident = await fetch(residents[i].dataset.character)
      .then((reponse) => reponse.json())
      .then((reponseJson) => reponseJson);

    residents[i].setAttribute("src", resident.image);
    residents[i].parentElement.setAttribute("title", resident.name);
    residents[i].previousSibling.previousSibling.setAttribute(
      "href",
      "/characters?name=" + resident.name
    );
  }
}

main();
