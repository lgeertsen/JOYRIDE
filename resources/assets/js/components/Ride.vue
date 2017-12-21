<script>
  export default {
    props: ['attributes'],

    data() {
      return {
      }
    },

    methods: {
      destroy() {
        axios.delete('/rides/' + this.attributes.id);

        $(this.$el).fadeOut(300, () => {
          flash('Your ride has been deleted. Your passenger will be notified');
        });
      }
    }
  }
</script>
