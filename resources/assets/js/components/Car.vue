<script>
  export default {
    props: ['attributes'],

    data() {
      return {
        editing: false,
        brand: this.attributes.brand,
        model: this.attributes.model,
        color: this.attributes.color,
        description: this.attributes.color + " " + this.attributes.brand + " " + this.attributes.model
      }
    },

    methods: {
      update() {
        axios.patch('/cars/' + this.attributes.id, {
          brand: this.brand,
          model: this.model,
          color: this.color,
        });

        this.description = this.color + " " + this.brand + " " + this.model;

        this.editing = false;

        flash('Updated!');
      },

      destroy() {
        axios.delete('/cars/' + this.attributes.id);

        $(this.$el).fadeOut(300, () => {
          flash('Your car has been deleted.');
        });
      }
    }
  }
</script>
