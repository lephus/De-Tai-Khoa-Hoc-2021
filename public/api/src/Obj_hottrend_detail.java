
public class Obj_hottrend_detail {
	public String id;
	public String id_hottrend;
	public String content_html;
	public String views;
	public String updated;
	public String is_disabled;
	public Obj_hottrend_detail(String id, String id_hottrend, String content_html, String views, String updated,
			String is_disabled) {
		super();
		this.id = id;
		this.id_hottrend = id_hottrend;
		this.content_html = content_html;
		this.views = views;
		this.updated = updated;
		this.is_disabled = is_disabled;
	}
	@Override
	public String toString() {
		return "Obj_hottrend_detail [id=" + id + ", id_hottrend=" + id_hottrend + ", content_html=" + content_html
				+ ", views=" + views + ", updated=" + updated + ", is_disabled=" + is_disabled + "]";
	}
	
}
