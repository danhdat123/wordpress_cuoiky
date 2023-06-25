( function( window, document ) {
  function golf_course_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const golf_course_nav = document.querySelector( '.sidenav' );
      if ( ! golf_course_nav || ! golf_course_nav.classList.contains( 'open' ) ) {
        return;
      }
      const elements = [...golf_course_nav.querySelectorAll( 'input, a, button' )],
        golf_course_lastEl = elements[ elements.length - 1 ],
        golf_course_firstEl = elements[0],
        golf_course_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;
      if ( ! shiftKey && tabKey && golf_course_lastEl === golf_course_activeEl ) {
        e.preventDefault();
        golf_course_firstEl.focus();
      }
      if ( shiftKey && tabKey && golf_course_firstEl === golf_course_activeEl ) {
        e.preventDefault();
        golf_course_lastEl.focus();
      }
    } );
  }
  golf_course_keepFocusInMenu();
} )( window, document );