document.querySelectorAll('.news-block').forEach(newsBlock => {
    newsBlock.addEventListener('click', function() {
        const newsId = this.dataset.id;
        window.location.href = `open_news.php?id=${newsId}`;
    });
});