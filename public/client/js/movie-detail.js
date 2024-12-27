const playTrailer = $(".video-play-button");
playTrailer.on("click", function () {
    $("#modal-trailer").css("display", "block");
})

const readMore = $(".read-more");
let isShow = false;
readMore.on("click", function () {
    if (!isShow) {
        $(".text").css("height", "100%")
        isShow = true;
    } else {
        $(".text").css("height", "150px")
        isShow = false;
    }
})
