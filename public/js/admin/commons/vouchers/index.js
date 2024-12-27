function updateCountdown() {
    $("tr[data-id-tr]").each(function() {
        const startDate = new Date($(this).data("start-date"));
        const endDate = new Date($(this).data("end-date"));
        const now = new Date();

        // Kiểm tra xem voucher đã hết hạn chưa
        if (endDate <= now) {
            $(this).find(".time-left").addClass("text-danger")
            $(this).find(".time-left").text("Voucher đã hết hạn");
        } else {
            const timeDiff = endDate - now;
            const days = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);

            let displayText = "Còn lại : ";
            if (days > 0) displayText += `${days} ngày `;
            displayText += `${hours} giờ ${minutes} phút ${seconds} giây`;

            $(this).find(".time-left").text(displayText);
        }
    });
}
setInterval(updateCountdown, 1000);
updateCountdown();