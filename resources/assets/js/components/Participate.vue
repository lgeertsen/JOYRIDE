<script>
  export default {
    props: ['attributes', 'userid', 'count', 'passengers'],

    data() {
      return {
        showJoin: true,
        showCancel: false,
        passengerCount: this.count,
        inside: false,
      }
    },

    created() {
      for(var i = 0; i < this.passengers.length; i++) {
        if(this.passengers[i].user_id = this.userid) {
          this.inside = true;
        }
      }
      if(this.inside) {
        this.showJoin = false;
        this.showCancel = true;
      }
    },

    methods: {
      participate() {
        axios.post('/passengers/' + this.attributes.id);

        this.inside = true;
        this.passengerCount--;
        this.showJoin = false;
        this.showCancel = true;

        flash('Your participation in the ride has been registered. The owner has been notified');
      },

      cancel() {
        axios.delete('/passengers/' + this.attributes.id);

        this.inside = false;
        this.passengerCount++;
        this.showJoin = true;
        this.showCancel = false;

        flash('Your participation in the ride has been canceled. The owner has been notified');
      }
    }
  }
</script>
