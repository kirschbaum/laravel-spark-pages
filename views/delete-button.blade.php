<delete-button inline-template
               :page="{{json_encode($page)}}"
>
    <button @click="deletePage()" type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
</delete-button>