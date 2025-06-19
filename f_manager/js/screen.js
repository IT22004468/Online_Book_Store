function takeScreenshot(date) {
            const targetElement = document.getElementById('screenshot-target');

            html2canvas(targetElement).then(function(canvas) {
                const screenshotImage = new Image();
                screenshotImage.src = canvas.toDataURL('image/png');
                document.body.appendChild(screenshotImage);
            });
        }