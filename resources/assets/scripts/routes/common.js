export default {
  init() {
    // JavaScript to be fired on all pages

    $('.headline').html(function () {
      var text = $(this).text().trim().split(' ');
      var first = text.shift();
      return (text.length > 0 ? '<span class="first-word">' + first + '</span> ' : first) + text.join(' ');
    });

  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
