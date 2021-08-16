import sendMultipartRequest from './sendMultipartRequest'

export default {
       addPost() {
              return sendMultipartRequest({
                     url: 'http://localhost:8000/api/posts',
                     method:'post'
              })
       }
}