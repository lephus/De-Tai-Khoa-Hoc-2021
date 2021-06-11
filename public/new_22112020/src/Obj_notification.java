
public class Obj_notification {
	public String id;
	public String content;
	public String updated;
	public String is_disabled;
	public Obj_notification(String id, String content, String updated, String is_disabled) {
		super();
		this.id = id;
		this.content = content;
		this.updated = updated;
		this.is_disabled = is_disabled;
	}
	@Override
	public String toString() {
		return "Obj_notification [id=" + id + ", content=" + content + ", updated=" + updated + ", is_disabled="
				+ is_disabled + "]";
	}
	
}
