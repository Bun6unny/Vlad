var newsBlocks = document.querySelectorAll('.news-block');

// Проходимся по каждому блоку и добавляем обработчик события щелчка
newsBlocks.forEach(function(block) {
    block.addEventListener('click', function() {
        // Получаем идентификатор новости из атрибута data-id
        var newsId = block.getAttribute('data-id');

        // Перенаправляем пользователя на страницу новости с помощью window.location
        window.location.href = 'open_news.php?id=' + newsId;
    });
});