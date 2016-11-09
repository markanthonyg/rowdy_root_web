window.onload = function () {

  // Vue component for patient list
  Vue.component('my-account-list', {
    template: '#my-account-list-template',

    props: ['accounts'],

    data: function(){
      return{
        toBeEdited: null,
        showEmailModal: false,
        showRecordModal: false
      }
    },

    methods: {
      showEditModal: function(account){
        this.toBeEdited = account;
        this.showRecordModal = true;
      },
      sendEmailModal: function(account) {
        this.toBeEdited = account;
        this.showEmailModal = true;
      },
      approveAccount: function(account){
        //this.toBeEdited = account;
        $.ajax({
          url : "/accountapproval/" + account.id,
          type: "PUT",
          data : {
            approved: 1
          },
          beforeSend: function(){
            // do something before send
          },
          complete: function(){
            // do somethind on complete
          },
          success:function(html)
          {
            //do something on success
            // location.reload();
          },
          error: function(jqXHR, textStatus, errorThrown)
          {
            // do something on error
          }
        });


        // Remove the account from the list
        this.accounts.$remove(account);
      },
      removeAccount: function(account){
        // function here to call AccountControllers destroy route with patients id
        this.$http.delete('/accountrecord/' + account.id);

        // Remove the account from the list
        this.accounts.$remove(account);
      },
      goTo: function(account) {
        // this.$http.get('/profile/' + account.id);
        location.href = '/profile/' + account.id;
      }
    }
  }),

  // vue component for edit-record-modal
  Vue.component('record-modal', {
    template: '#record-modal-template',

    props: {
      show: {
        type: Boolean,
        required: true,
        twoWay: true
      },
      account: {
        id: '',
        first_name: '',
        middle_name: '',
        last_name: '',
        role: '',
        email: '',
        dob: '',
        gender: '',
        username: ''
      }
    },

    methods: {
      closeRecord: function() {
        this.show = false;
      },
      saveRecord: function(account){
        this.show = false;

        $.ajax(
          {
            url : "/accountrecord/" + this.account.id,
            type: "PUT",
            data : {
              first_name: this.account.first_name,
              middle_name: this.account.middle_name,
              last_name: this.account.last_name,
              dob: this.account.dob,
              gender: this.account.gender,
              role: this.account.role
            },
            beforeSend: function(){
              // do something before send
            },
            complete: function(){
              // do somethind on complete
            },
            success:function(html)
            {
              //do something on success
              location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
              // do something on error
            }
            });
      }
    }
  }),
  Vue.component('email-modal', {
    template: '#email-modal-template',

    props: {
      show: {
        type: Boolean,
        required: true,
        twoWay: true
      },
      account: {
        first_name: '',
        last_name: '',
        email: ''
      },
      body: '',
      subject: ''
    },

    methods: {
      closeEmail: function() {
        this.show = false;
      },
      sendEmail: function(account) {
        this.show = false;
        var emailSubject = this.subject;
        var emailBody = this.body;

        $.ajax(
          {
            url : "/sendemail/" + this.account.id,
            type: "POST",
            data : {
              subject: emailSubject,
              body: emailBody
            },
            beforeSend: function(){
              // do something before send
              console.log(emailSubject);
              console.log(emailBody);
            },
            complete: function(){
              // do somethind on complete
            },
            success:function(html)
            {
              // do something on success
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
              // do something on error
            }
          });
      }
    }
  }),

  new Vue({
    el: '#accountTable',
  });
};
