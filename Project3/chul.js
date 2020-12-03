function store() {
  var name = document.getElementById("name").value;
  var setTime = document.getElementById("time").value;
  var setMove = document.getElementById("move").value;

  var currentBestTime = localStorage.getItem(name);
  var currentBestMove = localStorage.getItem(name + "move");

  if (setTime > currentBestTime) {
    localStorage.setItem(name, setTime);
    setTime = 0;
  } else {
    localStorage.setItem(name, currentBestTime);
  }

  if (setMove > currentBestMove) {
    localStorage.setItem(name + "move", setMove);
    setMove = 0;
  } else {
    localStorage.setItem(name + "move", currentBestMove);
  }

  var showBestTime = localStorage.getItem(name);
  var showBestMove = localStorage.getItem(name + "move");

  alert(
    "Congrats!" +
      name +
      "'s best time is " +
      showBestTime +
      " and best move is " +
      showBestMove +
      "."
  );
}
