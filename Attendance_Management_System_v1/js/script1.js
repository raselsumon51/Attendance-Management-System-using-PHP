document.body.addEventListener("keydown", (event) => {
  if (event.key == "ArrowLeft") {
    let x = document.getElementById("body");
    x.style.backgroundColor = "";
    plusSlides(-1);
  }

  if (event.key == "ArrowRight") {
    let x = document.getElementById("body");
    x.style.backgroundColor = "";
    plusSlides(1);
  }
});

function plusSlides(n) {
  let x = document.getElementById("body");
  x.style.backgroundColor = "";
  showSlides((slideIndex += n));
}

function currentSlide(n) {
  showSlides((slideIndex = n));
}
let slideIndex = 1;
showSlides(slideIndex);

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  slides[slideIndex - 1].style.display = "block";
}

function myf(id, course) {
  // console.log(id,course);

  $(document).ready(function () {
    $.ajax({
      url: "ajax-insert.php",
      type: "POST",
      data: { std_id: id, std_course: course },
      success: function (data) {
        if (data==1) {
          //alert(data);
          //alert("Successfully Added");
          let x = document.getElementById("body");
          x.style.background = "green";
        } else if(data==0){
          //alert("Removed");
          let x = document.getElementById("body");
          x.style.background = "red";
        }
      }
    });
  });
}

// function myf(id, course,date) {
//  //  console.log(id,course,date);

//   $(document).ready(function () {
//     $.ajax({
//       url: "ajax-insert.php",
//       type: "POST",
//       data: { std_id: id, std_course: course,std_date:date },
//       success: function (data) {
//         if (data == 1) {
//           //alert("Successfully Added");
//           let x = document.getElementById("body");
//           x.style.background = "green";
//         } else if (data == 0) {
//           // alert("Removed");
//           let x = document.getElementById("body");
//           x.style.background = "red";
//         }
//       }
//     });
//   });
// }
