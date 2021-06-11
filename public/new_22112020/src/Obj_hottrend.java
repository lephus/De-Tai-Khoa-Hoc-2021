
public class Obj_hottrend {
	public String id;
	public String title;
	public String short_desc;
	public String thumbnail;
	public String link;
	public String updated;
	public String is_disabled;
	
	public Obj_hottrend(String id, String title, String short_desc, String thumbnail, String link, String updated,
			String is_disabled) {
		super();
		this.id = id;
		this.title = title;
		this.short_desc = short_desc;
		this.thumbnail = thumbnail;
		this.link = link;
		this.updated = updated;
		this.is_disabled = is_disabled;
	}

	@Override
	public String toString() {
		return "Obj_hottrend [id=" + id + ", title=" + title + ", short_desc=" + short_desc + ", thumbnail=" + thumbnail
				+ ", link=" + link + ", updated=" + updated + ", is_disabled=" + is_disabled + "]";
	}
	
}
