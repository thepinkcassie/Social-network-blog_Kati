<div class="col-md-6">
          <div class="widget widget-update">
                <textarea rows="3" class="form-control" v-model="content"></textarea>
                              <br>
                              <button class="btn  btn-sm btn-success pull-right" :disabled="not_working" @click="create_post()">
                                    Post
                              </button>
                        </div>
                  </div>