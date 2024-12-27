$(document).ready(function () {
    var $iframe = $('#preview');
    var scale = 1;

    function zoomContent(scale) {
        var $iframeDocument = $iframe[0].contentDocument || $iframe[0].contentWindow.document;
        $iframeDocument.body.style.transform = `scale(${scale})`;
        $iframeDocument.body.style.transformOrigin = '0 0';
        $iframeDocument.body.style.width = `${100 / scale}%`;
    }

    var $zoomIn = $('#zoom-in');
    var $zoomOut = $('#zoom-out');

    if ($zoomIn.length) {
        $zoomIn.on('click', function () {
            scale += 0.1;
            zoomContent(scale);
        });
    }

    if ($zoomOut.length) {
        $zoomOut.on('click', function () {
            scale -= 0.1;
            scale = Math.max(scale, 0.1);
            zoomContent(scale);
        });
    }

    $iframe.on('load', function () {
        zoomContent(scale);
    });

    var $runCodeButton = $('#runCodeButton');
    if ($runCodeButton.length) {
        $runCodeButton.on('click', function () {
            $('#loadingSpinner').show();
            $('.liveCodeBox').hide();

            setTimeout(function () {
                $('#loadingSpinner').hide();
                $('.liveCodeBox').show();
            }, 2000);
        });
    }

    var $previewClose = $('#preview-close');
    if ($previewClose.length) {
        $previewClose.on('click', function () {
            $('.liveCodeBox').hide();
        });
    }
});
