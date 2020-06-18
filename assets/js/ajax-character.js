async function main() {
  let episodes = document.querySelectorAll(".js-appear-episode");
  let firstApparition = document.querySelectorAll(".js-first-episode");

  for (let i = 0; i < episodes.length; i++) {
    let episode = await fetch(episodes[i].dataset.episodes)
      .then((reponse) => reponse.json())
      .then((reponseJson) => reponseJson);
    episodes[i].setAttribute("href", "/episodes?season=" + episode.episode);
    episodes[i].textContent = episode.name;
  }
  for (let j = 0; j < firstApparition.length; j++) {
    let firstEpisode = await fetch(firstApparition[j].dataset.firstEpisode)
      .then((reponse) => reponse.json())
      .then((reponseJson) => reponseJson);
    firstApparition[j].textContent = firstEpisode.name;
  }
}

main();
