$(function () {
  let btnTop = document.querySelector(".to-top");
  btnTop.addEventListener("click", scrollToTop);

  stickFooterToBttom();

  $(window).on('resize', function () {
    stickFooterToBttom();
  });

  var slideIndex = 1;
  // Opent Modal
  $(".thN").on('click', function (e) {
    document.getElementById("myModal").style.display = "block";
    $(".footer").addClass("hide");
    let n = e.currentTarget.id.slice(4);
    // console.log("img", n);
    showSlides(slideIndex = Number(n) + 1);
  });
  // Close Modal

  $(".cust-close").on('click', function () {
    document.getElementById("myModal").style.display = "none";
    $(".footer").removeClass("hide");
  })

  // Next/previous controls
  $(".cust-prev").on('click', function () {
    plusSlides(-1);
  })

  $(".cust-next").on('click', function () {
    plusSlides(1);
  })

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  // Thumbnail image controls
  $(".demo").on('click', function (e) {
    let n = e.currentTarget.id.slice(5);
    // console.log("t ", n);
    showSlides(slideIndex = Number(n) + 1);
  })

  function showSlides(n) {
    // console.log("show Slide", n);
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("demo");
    let captionText = document.getElementById("caption");
    if (n > slides.length) {
      slideIndex = 1
    }
    if (n < 1) {
      slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    // captionText.innerHTML = dots[slideIndex - 1].alt;
    captionText.innerHTML = dots[slideIndex - 1].title;
    // captionText.innerHTML = dots[slideIndex-1].next();
  }
});

function scrollToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

function stickFooterToBttom() {
  let footer = $("footer");
  let windowHeight = $(window).height();
  let contHeight = $("main").height() + $("header").height();
  let footerHeight = footer.height();
  let testHeight = windowHeight - footerHeight;
  // console.log("Footer H:"+footerHeight+"\ncontHeight: "+contHeight+"\ntestHeight:
  // "+testHeight);

  if (contHeight < testHeight) {
    // console.log(contHeight+"<"+testHeight);
    footer.addClass("fixed-bottom");
  }
  if (contHeight > testHeight) {
    // console.log(contHeight+" > "+testHeight);
    footer.removeClass("fixed-bottom");
  }
}