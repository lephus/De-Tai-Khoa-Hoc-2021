
public class Obj_comment {
	public String id;
	public String type_comment_id;
	public String content;
	public String id_post;
	public String updated;
	public String is_disabled;
	public Obj_comment(String id, String type_comment_id, String content, String id_post, String updated,
			String is_disabled) {
		super();
		this.id = id;
		this.type_comment_id = type_comment_id;
		this.content = content;
		this.id_post = id_post;
		this.updated = updated;
		this.is_disabled = is_disabled;
	}
	@Override
	public String toString() {
		return "Obj_comment [id=" + id + ", type_comment_id=" + type_comment_id + ", content=" + content + ", id_post="
				+ id_post + ", updated=" + updated + ", is_disabled=" + is_disabled + "]";
	}	
}
