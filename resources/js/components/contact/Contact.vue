<template>
    <div>
        <div class="block-header block-header--has-breadcrumb block-header--has-title">
            <div class="container">
                <div class="block-header__body">
                    <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb__list">
                            <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>

                            <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first">
                                <a :href="'/'" class="breadcrumb__item-link">Home</a>
                            </li>

                            <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">
                                <span class="breadcrumb__item-link">Contact Us</span>
                            </li>

                            <li class="breadcrumb__title-safe-area" role="presentation"></li>
                        </ol>
                    </nav>

                    <h1 class="block-header__title">Contact Us</h1>
                </div>
            </div>
        </div>

        <div class="block">
            <div class="container container--max--lg">
                <div class="card"><div class="card-body card-body--padding--2">
                    <div class="row">
                        <div class="col-12 col-lg-6 pb-4 pb-lg-0">
                            <div class="mr-1">
                                <h4 class="contact-us__header card-title">Our Address</h4>
                                <div class="contact-us__address">
                                    <p v-html="address.note"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="ml-1">
                                <h4 class="contact-us__header card-title">Leave us a Message</h4>
                                <form method="POST" @submit.prevent="store()">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="form-name">Your Name</label>
                                            <input type="text" id="form-name" name="name" v-model="name" class="form-control" placeholder="Your Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="form-email">Email</label>
                                            <input type="email" id="form-email" name="email" v-model="email" class="form-control" placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="form-subject">Subject</label>
                                        <input type="text" id="form-subject" name="subject" v-model="subject" class="form-control" placeholder="Subject">
                                    </div>
                                    <div class="form-group">
                                        <label for="form-message">Message</label>
                                        <textarea id="form-message" name="message" v-model="message" class="form-control" rows="4"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            address : [],

            name: '',
            email : '',
            subject : '',
            message : '',
        }
    },
    created() {
        axios.get('/show/address')
            .then(response => {
                this.address = response.data
            })
        .catch(error => {
            console.log(error)
        })
    },

    methods: {
        store() {
            axios.post('/leave/message', {
                name : this.name,
                email : this.email,
                subject : this.subject,
                message : this.message,
            })
            .then(response => {
                if (response.status === 201) {
                    alert('Your Message has been send');
                    this.name = '';
                    this.email = '';
                    this.subject = '';
                    this.message = '';
                }
            })
            .catch(error => {
                console.log(error)
            })
        }
    }
}
</script>

<style scoped>

</style>
