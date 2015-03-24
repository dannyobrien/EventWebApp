window.onload = function () {
    //-------------------------------------------------------------------------
    // define an event listener for the '#createEventForm'
    //-------------------------------------------------------------------------
    var createEventForm = document.getElementById('createEventForm');
    if (createEventForm !== null) {
        createEventForm.addEventListener('submit', validateEventForm);
    }

    function validateEventForm(event) {
        var form = event.target;

        if (!confirm("Is the form data correct?")) {
            event.preventDefault();
        }
    }

    //-------------------------------------------------------------------------
    // define an event listener for the '#createEventForm'
    //-------------------------------------------------------------------------
    var editEventForm = document.getElementById('editEventForm');
    if (editEventForm !== null) {
        editEventForm.addEventListener('submit', validateEventForm);
    }

    //-------------------------------------------------------------------------
    // define an event listener for any '.deleteEvent' links
    //-------------------------------------------------------------------------
    var deleteLinks = document.getElementsByClassName('deleteEvent');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this event?")) {
            event.preventDefault();
        }
    }

};