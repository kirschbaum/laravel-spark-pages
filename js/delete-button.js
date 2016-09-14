Vue.component('delete-button', {
    props: [
        'page'
    ],
    
    methods: {
        deletePage: function(){
            var _this = this;
            swal({
                title: "Are you sure you want to delete this page?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#1ab394",
                confirmButtonText: "Yes",
                closeOnConfirm: false
            }, function(){
                _this.$http.delete('/pages/' + _this.page.slug).then(function () {
                    window.location.replace("/pages/create");
                });
            });

        }
    }
});