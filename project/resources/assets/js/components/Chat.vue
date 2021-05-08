<template>
  <div class="chat-block">
    <div class="row">
      <div class="col-md-3">
        <div class="user-container">
          <!-- <div class="search-block">
            <form>
              <input type="search" class="form-control" id="search" placeholder="Search Here..."/>
              <a href="#"><i class="fa fa-search"></i></a>
            </form>
          </div> -->
          <ul class="user-list">
            <div v-if="friends.length != 0">
              <div v-for="friend in friends">
                <li class="user-block">
                  <a href="#" @click.prevent="fetchChats(friend)">
                    <div class="user-img">
                      <div v-if="friend.role == 'c'">
                        <img :src="$props.couple_image+'/'+friend.image" class="img-responsive" alt="avatar">
                      </div>
                      <div v-if="friend.role == 'v'">
                        <img :src="$props.vendor_image+'/'+friend.image" class="img-responsive" alt="avatar">
                      </div>
                    </div>
                    <div class="user-desc">
                      <h4 class="user-name">{{friend.first_name}}</h4>
                      <p v-if="checkUser(friend.id)">Active</p>
                      <p v-else>Not Active</p>
                    </div>
                  </a>
                </li>
              </div>
            </div>
            <div v-else>
              You have no friends.
            </div>
          </ul>
        </div>
      </div>
      <div class="col-md-9">
        <div class="message-header">
          <div v-if="f_id != null">
            <img :src="friend_image" class="img-responsive friend-chat-image" alt="avatar">
            <h4 class="message-title">{{friend_name}}</h4>
          </div>
        </div>
        <div id="message-container" class="message-container">
          <div v-if="chats.length != 0">
            <div v-for="(chat, index) in chats">
              <div v-if="chat.user_id == u_id">
                <div class="message-dtl box-right">
                  <img :src="user_image" class="img-responsive get-user-image" alt="avatar">                    
                  <p>{{chat.chat}}</p>
                  <span class="time">{{ chat.created_at }}</span>
                </div>
              </div>
              <div v-else>
                <div class="message-dtl box-left">
                  <img :src="friend_image" class="img-responsive friend-chat-image" alt="avatar">
                  <p>{{chat.chat}}</p>
                  <span class="time">{{ chat.created_at }}</span>
                </div>
              </div>
            </div>
          </div>  
          <div v-else>
            There are no messages.
          </div>
        </div> 
        <div class="message-footer"> 
          <input class="textarea" @keyup.enter="sendChat" v-model="chat" type="text" placeholder="Type here!"/>
        </div>        
      </div>
    </div>
  </div>
</template>

<script>
  export default {

    props: ['couple_image', 'vendor_image', 'user', 'friend'],

    data () {
      return {
        friends: [],
        friend_name: '',
        friend_image: '',
        user_image: '',
        chats: [],
        chat: '',
        f_id: '',
        u_id: '',
        onlineUsers: ''
      }
    },

    created () {
      this.fetchFriends();
      this.f_id = this.$props.friend.id;
      this.u_id = this.$props.user.id;
      this.setUserImage(this.$props.user);
      this.fetchChats(this.$props.friend);
      if (this.f_id != null) {
        Echo.private('Chat.' + this.f_id + '.' + this.u_id)
          .listen('BroadcastChat', (e) => {
            document.getElementById('ChatAudio').play();
            this.chats.push(e.chat);
            setTimeout(function(){
              this.scrollToEnd();
            }.bind(this), 500);
          });
      }
      Echo.join('Online')
          .here((users) => {
            this.onlineUsers = users;
          })
          .joining((user) => {
            this.onlineUsers.push(user);
          })
          .leaving((user) => {
            this.onlineUsers = this.onlineUsers.filter((u) => { u != user });
          });
    },

    methods: {

      setUserImage(user) {

        if (user.role == 'c') {

          this.user_image = `${this.$props.couple_image + '/' + user.image}`;

        } else if (user.role == 'v') {

          this.user_image = `${this.$props.vendor_image + '/' + user.image}`;

        }

      },


      scrollToEnd() {     
        var container = document.getElementById("message-container");
        container.scrollTop = container.scrollHeight;
      },

      checkUser(friend_id) {
        return _.find(this.onlineUsers, {id: friend_id});
      },

      fetchFriends() {
        this.$http.get('get_friends').then(response => {
          this.friends = response.data;
        }).catch((e) => {
          console.log(e)
        });
      },

      fetchChats(friend) {
        this.f_id = friend.id;
        this.$http.get('get_friends/'+friend.id).then(response => {
          this.chats = null;
          this.chats = response.data;
        }).catch((e) => {
          console.log(e)
        }); 
        setTimeout(function(){
          this.scrollToEnd();
        }.bind(this), 1000);
        this.friend_name = friend.first_name;
        if (friend.role == 'c') {
          this.friend_image = `${this.$props.couple_image + '/' + friend.image}`;
        } else if (friend.role == 'v') {
          this.friend_image = `${this.$props.vendor_image + '/' + friend.image}`;
        }
      },

      sendChat() {
        if (this.chat != '') {
          var data = {
            chat: this.chat,
            friend_id: this.f_id,
            user_id: this.u_id
          }
          this.chat = '';
          this.$http.post('send_chat', data).then(response => {
            this.chats.push(data);
          }).catch((e) => {
            console.log(e)
          }); 
          setTimeout(function(){
            this.scrollToEnd();
          }.bind(this), 750);
        }
      }
    }
  }

</script>
