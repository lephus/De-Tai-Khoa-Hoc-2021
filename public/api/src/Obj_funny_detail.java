
public class Obj_funny_detail {
	public String id;
	public String id_funny;
	public String content_html;
	public String views;
	public String updated;
	public String is_disabled;
	public Obj_funny_detail(String id, String id_funny, String content_html, String views, String updated,
			String is_disabled) {
		super();
		this.id = id;
		this.id_funny = id_funny;
		this.content_html = content_html;
		this.views = views;
		this.updated = updated;
		this.is_disabled = is_disabled;
	}
	@Override
	public String toString() {
		return "Obj_funny_detail [id=" + id + ", id_funny=" + id_funny + ", content_html=" + content_html + ", views="
				+ views + ", updated=" + updated + ", is_disabled=" + is_disabled + "]";
	}
	
}
