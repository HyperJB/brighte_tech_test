const parts = document.getElementById('parts');

if(parts) {
    parts.addEventListener('click', e => {
        if(e.target.className === "btn btn-danger delete-part") {
            if(confirm('Are you sure?')) {
                const id = e.target.getAttribute('data-id');

                fetch(`/delete/${id}`, {
                    method: 'DELETE'
                }).then(res => window.location.reload());
            }
        }
    });
}