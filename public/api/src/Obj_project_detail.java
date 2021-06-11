
public class Obj_project_detail {
	public String id;
	public String project_id;
	public String content_html;
	public String views;
	public String updated;
	public String is_disabled;
	public Obj_project_detail(String id, String project_id, String content_html, String views, String updated,
			String is_disabled) {
		super();
		this.id = id;
		this.project_id = project_id;
		this.content_html = content_html;
		this.views = views;
		this.updated = updated;
		this.is_disabled = is_disabled;
	}
	@Override
	public String toString() {
		return "Obj_project_detail [id=" + id + ", project_id=" + project_id + ", content_html=" + content_html
				+ ", views=" + views + ", updated=" + updated + ", is_disabled=" + is_disabled + "]";
	}
	
}
