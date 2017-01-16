<h3>{{text.comments}}</h3>
<div class="comment-content">
    <ul class="cpm-comment-wrap">
        <li class="cpm-comment" v-for="comment in comments" >
            <div class="cpm-right">
                <a href="#" class="cpm-btn cpm-btn-xs" @click="deleteComment(comment)"><span class="dashicons dashicons-trash"></span></a>
            </div>
            <div class="cpm-avatar ">{{{comment.avatar}}}</div>
            <div class="cpm-comment-container">
                <div class="cpm-comment-meta">
                    <span class="cpm-author">{{comment.comment_author}}</span>
                    {{text.on}}
                    <span class="cpm-date">{{comment.comment_date}}</span>

                </div>
                <div class="cpm-comment-content">
                    {{{comment.comment_content}}}
                </div>

                <div v-if="comment.files.length">
                    <ul class="cpm-attachments">
                        <li v-for="cfile in comment.files">
                        <prettyphoto :file="cfile" ></prettyphoto>

                        </li>
                    </ul>

                </div>

            </div>

        </li>
    </ul>

</div>

<div class='cpm-new-doc-comment-form'>
    <form @submit.prevent="createComment(comments, formid, task)" :id="formid">
        <input type="hidden" name="action" value="cpm_task_create_comment" />
        <input type="hidden" name="project_id" value="{{pree_init_data.current_project}}" />
        <input type="hidden" name="parent_id" value="{{task.ID}}" />
        <input type="hidden" name="_wpnonce" value="{{pree_init_data.cpm_nonce}}" />

        <div class="cpm-trix-editor">
            <input id="cc-{{formid}}" type="hidden" name="description" class="comment-content" value="" />
            <trix-editor input="cc-{{formid}}"></trix-editor>
        </div>

        <fileuploader_task :files="" :uploderid="uploderid"></fileuploader_task>
        <input type="submit" name="submit" value="{{text.add_comment}}" class="button-primary" />
    </form>
</div>