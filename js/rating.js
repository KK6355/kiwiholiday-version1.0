function ratingStar1() {
  if (document.getElementById("star1").className == "far fa-star") {
    document.getElementById("star1").className = "fas fa-star";
    document.getElementById("star").value = "1";
  } else {
    document.getElementById("star1").className = "far fa-star";
    document.getElementById("star").value = "";
  }
  if (document.getElementById("star2").className == "fas fa-star") {
    document.getElementById("star1").className = "fas fa-star";
    document.getElementById("star2").className = "far fa-star";
    document.getElementById("star3").className = "far fa-star";
    document.getElementById("star4").className = "far fa-star";
    document.getElementById("star5").className = "far fa-star";
    document.getElementById("star").value = "1";
  }
}
function ratingStar2() {
  if (document.getElementById("star2").className == "far fa-star") {
    document.getElementById("star1").className = "fas fa-star";
    document.getElementById("star2").className = "fas fa-star";
    document.getElementById("star").value = "2";
  } else {
    document.getElementById("star2").className = "far fa-star";
    document.getElementById("star").value = "1";
  }
  if (document.getElementById("star3").className == "fas fa-star") {
    document.getElementById("star1").className = "fas fa-star";
    document.getElementById("star2").className = "fas fa-star";
    document.getElementById("star3").className = "far fa-star";
    document.getElementById("star4").className = "far fa-star";
    document.getElementById("star5").className = "far fa-star";
    document.getElementById("star").value = "2";
  }
}
function ratingStar3() {
  if (document.getElementById("star3").className == "far fa-star") {
    document.getElementById("star1").className = "fas fa-star";
    document.getElementById("star2").className = "fas fa-star";
    document.getElementById("star3").className = "fas fa-star";
    document.getElementById("star").value = "3";
  } else {
    document.getElementById("star3").className = "far fa-star";
    document.getElementById("star").value = "2";
  }
  if (document.getElementById("star4").className == "fas fa-star") {
    document.getElementById("star1").className = "fas fa-star";
    document.getElementById("star2").className = "fas fa-star";
    document.getElementById("star3").className = "fas fa-star";
    document.getElementById("star4").className = "far fa-star";
    document.getElementById("star5").className = "far fa-star";
    document.getElementById("star").value = "3";
  }
}
function ratingStar4() {
  if (document.getElementById("star4").className == "far fa-star") {
    document.getElementById("star1").className = "fas fa-star";
    document.getElementById("star2").className = "fas fa-star";
    document.getElementById("star3").className = "fas fa-star";
    document.getElementById("star4").className = "fas fa-star";
    document.getElementById("star").value = "4";
  } else {
    document.getElementById("star4").className = "far fa-star";
    document.getElementById("star").value = "3";
  }
  if (document.getElementById("star5").className == "fas fa-star") {
    document.getElementById("star1").className = "fas fa-star";
    document.getElementById("star2").className = "fas fa-star";
    document.getElementById("star3").className = "fas fa-star";
    document.getElementById("star4").className = "fas fa-star";
    document.getElementById("star5").className = "far fa-star";
    document.getElementById("star").value = "4";
  }
}
function ratingStar5() {
  if (document.getElementById("star5").className == "far fa-star") {
    document.getElementById("star1").className = "fas fa-star";
    document.getElementById("star2").className = "fas fa-star";
    document.getElementById("star3").className = "fas fa-star";
    document.getElementById("star4").className = "fas fa-star";
    document.getElementById("star5").className = "fas fa-star";
    document.getElementById("star").value = "5";
  } else {
    document.getElementById("star5").className = "far fa-star";
    document.getElementById("star").value = "4";
  }
}

function displayContent(id1, id2, idB1, idB2) {
  document.getElementById(id1).style.display = "block";
  document.getElementById(id2).style.display = "none";
  document.getElementById(idB1).style.backgroundColor = "black";
  document.getElementById(idB2).style.backgroundColor = "white";
  document.getElementById(idB1).style.color = "white";
  document.getElementById(idB2).style.color = "black";
}

function ratingStar1(id1, id2, id3, id4, id5, id) {
  if (document.getElementById(id1).className == "far fa-star") {
    document.getElementById(id1).className = "fas fa-star";
    document.getElementById(id).value = "1";
  } else {
    document.getElementById(id1).className = "far fa-star";
    document.getElementById(id).value = "";
  }
  if (document.getElementById(id2).className == "fas fa-star") {
    document.getElementById(id1).className = "fas fa-star";
    document.getElementById(id2).className = "far fa-star";
    document.getElementById(id3).className = "far fa-star";
    document.getElementById(id4).className = "far fa-star";
    document.getElementById(id5).className = "far fa-star";
    document.getElementById(id).value = "1";
  }
}
function ratingStar2(id1, id2, id3, id4, id5, id) {
  if (document.getElementById(id2).className == "far fa-star") {
    document.getElementById(id1).className = "fas fa-star";
    document.getElementById(id2).className = "fas fa-star";
    document.getElementById(id).value = "2";
  } else {
    document.getElementById(id2).className = "far fa-star";
    document.getElementById(id).value = "1";
  }
  if (document.getElementById(id3).className == "fas fa-star") {
    document.getElementById(id1).className = "fas fa-star";
    document.getElementById(id2).className = "fas fa-star";
    document.getElementById(id3).className = "far fa-star";
    document.getElementById(id4).className = "far fa-star";
    document.getElementById(id5).className = "far fa-star";
    document.getElementById(id).value = "2";
  }
}
function ratingStar3(id1, id2, id3, id4, id5, id) {
  if (document.getElementById(id3).className == "far fa-star") {
    document.getElementById(id1).className = "fas fa-star";
    document.getElementById(id2).className = "fas fa-star";
    document.getElementById(id3).className = "fas fa-star";
    document.getElementById(id).value = "3";
  } else {
    document.getElementById(id3).className = "far fa-star";
    document.getElementById(id).value = "2";
  }
  if (document.getElementById(id4).className == "fas fa-star") {
    document.getElementById(id1).className = "fas fa-star";
    document.getElementById(id2).className = "fas fa-star";
    document.getElementById(id3).className = "fas fa-star";
    document.getElementById(id4).className = "far fa-star";
    document.getElementById(id5).className = "far fa-star";
    document.getElementById(id).value = "3";
  }
}
function ratingStar4(id1, id2, id3, id4, id5, id) {
  if (document.getElementById(id4).className == "far fa-star") {
    document.getElementById(id1).className = "fas fa-star";
    document.getElementById(id2).className = "fas fa-star";
    document.getElementById(id3).className = "fas fa-star";
    document.getElementById(id4).className = "fas fa-star";
    document.getElementById(id).value = "4";
  } else {
    document.getElementById(id4).className = "far fa-star";
    document.getElementById(id).value = "3";
  }
  if (document.getElementById(id5).className == "fas fa-star") {
    document.getElementById(id1).className = "fas fa-star";
    document.getElementById(id2).className = "fas fa-star";
    document.getElementById(id3).className = "fas fa-star";
    document.getElementById(id4).className = "fas fa-star";
    document.getElementById(id5).className = "far fa-star";
    document.getElementById(id).value = "4";
  }
}
function ratingStar5(id1, id2, id3, id4, id5, id) {
  if (document.getElementById(id5).className == "far fa-star") {
    document.getElementById(id1).className = "fas fa-star";
    document.getElementById(id2).className = "fas fa-star";
    document.getElementById(id3).className = "fas fa-star";
    document.getElementById(id4).className = "fas fa-star";
    document.getElementById(id5).className = "fas fa-star";
    document.getElementById(id).value = "5";
  } else {
    document.getElementById(id5).className = "far fa-star";
    document.getElementById(id).value = "4";
  }
}
