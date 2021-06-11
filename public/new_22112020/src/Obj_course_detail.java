
public class Obj_course_detail {
	public String id;
	public String course_id;
	public String content_html;
	public String views;
	public String updated;
	public String is_disabled;
	public Obj_course_detail(String id, String course_id, String content_html, String views, String updated,
			String is_disabled) {
		super();
		this.id = id;
		this.course_id = course_id;
		this.content_html = content_html;
		this.views = views;
		this.updated = updated;
		this.is_disabled = is_disabled;
	}
	@Override
	public String toString() {
		return "Obj_course_detail [id=" + id + ", course_id=" + course_id + ", content_html=" + content_html
				+ ", views=" + views + ", updated=" + updated + ", is_disabled=" + is_disabled + "]";
	}
	
}

