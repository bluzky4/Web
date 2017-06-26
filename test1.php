<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
@session_start();

require_once("meniu.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Teste pentru inteligenta</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="../css/teste.css">
</head>
<body >
<div class="quiz-container">
  <div id="quiz" ></div>
</div>
<button id="previous">Previous Question</button>
<button id="next">Next Question</button>
<button id="submit">Submit Quiz</button>
<div id="results"></div>
    <script>
        (function() {
  const myQuestions = [
    {
      question: "La preprocesarea unui fisier sursa C:",
      answers: {
        a: "Se includ functiile de biblioteca",
        b: "Se obtine o noua versiune a textului sursa",
        c: "Se obtine codul obiect"
      },
      correctAnswer: "b"
    },
    {
      question: "#define Pi 3.14\n\
                    int r;\n\
                    valoarea expresiei 2*Pi * r va fi de tipul?",
      answers: {
        a: "int",
        b: "real",
        c: "double"
      },
      correctAnswer: "c"
    },
    {
      question: "Ce este gresit in  #define cub(x) 	x*x*x?",
      answers: {
        a: "cu o directiva define nu se pot defini decat constante simbolice",
        b: "parametrului x nu i s-a declarat tipul",
        c: "la apeluri de genul cub(a+b) rezultatul nu reprezinta, in general, cubul sumei (a+b)",
        d: "Nimic Gresit"
      },
      correctAnswer: "c"
    },
    {
      question: "Care din variante defineste corect si complet ce anume se specifica prin tipul unei date?",
      answers: {
        a: "Numarul de octeti ocupati",
        b: " Spatiul necesar reprezentarii si modul de reprezentare",
        c: "Operatiile permise"
      },
      correctAnswer: "b"
    },
    {
      question: "#define swap(a,b) poate fi scris ca si swap(x,y)?",
      answers: {
        a: "indiferent de ce tip numeric sunt variabilele x si y",
        b: "numai daca x si y sunt variabile de tip intreg",
        c: "numai daca x si y sunt variabile de tip real "
      },
      correctAnswer: "a"
    }
  ];

  function buildQuiz() {
    // we'll need a place to store the HTML output
    const output = [];

    // for each question...
    myQuestions.forEach((currentQuestion, questionNumber) => {
      // we'll want to store the list of answer choices
      const answers = [];

      // and for each available answer...
      for (letter in currentQuestion.answers) {
        // ...add an HTML radio button
        answers.push(
          `<label>
             <input type="radio" name="question${questionNumber}" value="${letter}">
              ${letter} :
              ${currentQuestion.answers[letter]}
           </label>`
        );
      }

      // add this question and its answers to the output
      output.push(
        `<div class="slide">
           <div class="question"> ${currentQuestion.question} </div>
           <div class="answers"> ${answers.join("")} </div>
         </div>`
      );
    });

    // finally combine our output list into one string of HTML and put it on the page
    quizContainer.innerHTML = output.join("");
  }

  function showResults() {
    // gather answer containers from our quiz
    const answerContainers = quizContainer.querySelectorAll(".answers");

    // keep track of user's answers
    let numCorrect = 0;

    // for each question...
    myQuestions.forEach((currentQuestion, questionNumber) => {
      // find selected answer
      const answerContainer = answerContainers[questionNumber];
      const selector = `input[name=question${questionNumber}]:checked`;
      const userAnswer = (answerContainer.querySelector(selector) || {}).value;

      // if answer is correct
      if (userAnswer === currentQuestion.correctAnswer) {
        // add to the number of correct answers
        numCorrect++;

        // color the answers green
        answerContainers[questionNumber].style.color = "lightgreen";
      } else {
        // if answer is wrong or blank
        // color the answers red
        answerContainers[questionNumber].style.color = "red";
      }
    });

    // show number of correct answers out of total
    resultsContainer.innerHTML = `${numCorrect} out of ${myQuestions.length}`;
  }

  function showSlide(n) {
    slides[currentSlide].classList.remove("active-slide");
    slides[n].classList.add("active-slide");
    currentSlide = n;
    
    if (currentSlide === 0) {
      previousButton.style.display = "none";
    } else {
      previousButton.style.display = "inline-block";
    }
    
    if (currentSlide === slides.length - 1) {
      nextButton.style.display = "none";
      submitButton.style.display = "inline-block";
    } else {
      nextButton.style.display = "inline-block";
      submitButton.style.display = "none";
    }
  }

  function showNextSlide() {
    showSlide(currentSlide + 1);
  }

  function showPreviousSlide() {
    showSlide(currentSlide - 1);
  }

  const quizContainer = document.getElementById("quiz");
  const resultsContainer = document.getElementById("results");
  const submitButton = document.getElementById("submit");

  // display quiz right away
  buildQuiz();

  const previousButton = document.getElementById("previous");
  const nextButton = document.getElementById("next");
  const slides = document.querySelectorAll(".slide");
  let currentSlide = 0;

  showSlide(0);

  // on submit, show results
  submitButton.addEventListener("click", showResults);
  previousButton.addEventListener("click", showPreviousSlide);
  nextButton.addEventListener("click", showNextSlide);
})();
    </script>

</body>
</html>
