window.onload = function () {
    //-------------------------------------------------------------------------
    // define an event listener for the '#createProgrammerForm'
    //-------------------------------------------------------------------------
    var createProgrammerForm = document.getElementById('createProgrammerForm');
    if (createProgrammerForm !== null) {
        createProgrammerForm.addEventListener('submit', validateProgrammerForm);
    }

    function validateProgrammerForm(event) {
        var form = event.target;

        if (!confirm("Is the form data correct?")) {
            event.preventDefault();
        }
    }

    //-------------------------------------------------------------------------
    // define an event listener for the '#createProgrammerForm'
    //-------------------------------------------------------------------------
    var editProgrammerForm = document.getElementById('editProgrammerForm');
    if (editProgrammerForm !== null) {
        editProgrammerForm.addEventListener('submit', validateProgrammerForm);
    }

    //-------------------------------------------------------------------------
    // define an event listener for any '.deleteProgrammer' links
    //-------------------------------------------------------------------------
    var deleteLinks = document.getElementsByClassName('deleteProgrammer');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this programmer?")) {
            event.preventDefault();
        }
    }

};